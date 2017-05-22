<?php

# frontend maincontroller index.php

session_start();

require_once 'inc/config.php';
require_once 'inc/shopFunctions.php';

# get url parameter
$module = ucfirst(strToLower(getRequestValue("module")));
$action = strToLower(getRequestValue("action"));
$sortCriteria = getRequestValue("sort");

# setting for default module and default action
if (!$module) {
    $module = "Article";
}
if (!$action) {
    $action = "welcome";
}

# establish database connection
try {
    $db = new PDO($config["pdo_dsn"], $config["pdo_user"], $config["pdo_password"], $config["pdo_config"]);
} catch (PDOException $error) {
    showFatalError("Database Error: " . $error->getMessage());
    die();
}
$db->query('SET NAMES utf8');

# load model
if (file_exists("models/" . $module . ".php")) {
    require_once("models/" . $module . ".php");
}

$view = "views/" . strToLower($module) . ucfirst(strToLower($action)) . ".php";

# build navigation menue with article groups
require_once("models/ArticleGroup.php");
$articleGroups = Articlegroup::findAll($db);
$navItems[] = array('name' => 'Home', 'url' => 'index.php');
foreach ($articleGroups as $articleGroup) {
    $navItems[] = array(
        'name' => $articleGroup['groupname'],
        'url' => 'index.php?module=article&action=list&group=' . $articleGroup['id']
    );
}
# add static menue items
$navItems[] = array('name' => 'Warenkorb', 'url' => 'index.php?module=basket&action=fullview');
if (isVerifiedCustomer()) {
    $navItems[] = array('name' => 'Mein Konto', 'url' => 'index.php?module=account&action=view');
} else {
    $navItems[] = array('name' => 'Anmelden', 'url' => 'index.php?module=login&action=do');
}

# Main controller 

switch ($module) {

    case "Article":

        switch ($action) {

            case "welcome":
                # show welcome page
                $appTitle = "Wilkommen";
                break;

            case "list":
                # show article by group (selected via menue)
                $groupId = getRequestValue('group');
                $group = new Articlegroup;
                $group->findById($db, $groupId);
                $articles = Article::findByGroup($db, $groupId);
                $appTitle = "Artikel - Liste";
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Login":

        switch ($action) {

            case "do":
                # login procedure
                $appTitle = "Anmeldung";
                if (getRequestValue("submit") == "Anmelden") {
                    require_once 'models/Customer.php';
                    $username = strToLower(getRequestValue("loginName"));
                    $userpassword = getRequestValue("loginPassword");
                    $result = Customer::verifyUser($db, $username, $userpassword);
                    if ($result) {
                        header("location: index.php");
                    }
                }
                break;

            case "exit":
                # delete all session vars and destroy session
                foreach ($_SESSION as $key) {
                    unset($_SESSION[$key]);
                }
                session_destroy();
                header('location: index.php');
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Account":

        switch ($action) {

            case "view":
                # show my account page
                $appTitle = "Mein Konto";
                # get data about logged in customer
                require_once 'models/Customer.php';
                $customer = new Customer();
                $customer->findById($db, $_SESSION["customerId"]);
                # get recent orders
                require_once 'models/Order.php';
                $orders = Order::findAllByCustomer($db, $_SESSION["customerId"]);
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Basket":

        # basket controller is only used in ajax request in the webshop-basket div container

        switch ($action) {
        
            case "fullview":
                $appTitle = "Warenkorb";
                # get basket data from session
                $basket = isset($_SESSION['basket']) ? unserialize($_SESSION['basket']) : null;
                # calculate price sum
                $priceSum = 0;
                if ($basket) {
                    foreach ($basket as $pos) {
                        $priceSum += $pos['amount'] * $pos['articlePrice'];
                    }
                }
                # generate json data for local storage
                $basketJson = json_encode($basket);
                $view = "views/basketFullview.php";
                break;

            case "view":
                # get basket data from session
                $basket = isset($_SESSION['basket']) ? unserialize($_SESSION['basket']) : null;
                # calculate price sum
                $priceSum = 0;
                if ($basket) {
                    foreach ($basket as $pos) {
                        $priceSum += $pos['amount'] * $pos['articlePrice'];
                    }
                }
                # generate json data for local storage
                $basketJson = json_encode($basket);
                $view = "views/_basket.php";
                break;

            case "add":
                # check if article is already ordered
                $articleId = getRequestValue('id');
                $oldBasket = isset($_SESSION['basket']) ? unserialize($_SESSION['basket']) : null;
                $basket = null;
                $alreadyThere = false;
                require_once 'models/Article.php';
                if ($oldBasket) {

                    foreach ($oldBasket as $basketPosition) {
                        if ($basketPosition['articleId'] == $articleId) {
                            # add amount
                            $basket[] = array(
                                'articleId' => $basketPosition['articleId'],
                                'amount' => $basketPosition['amount'] + 1,
                                'articleName' => $basketPosition['articleName'],
                                'articlePrice' => $basketPosition['articlePrice']
                            );
                            $alreadyThere = true;
                        } else {
                            $basket[] = $basketPosition;
                        }
                    }
                }
                if (!$alreadyThere) {
                    # add position to basket
                    # load article data
                    $article = new Article();
                    $article->findById($db, $articleId);

                    # add new position to basket
                    $basket[] = array(
                        'articleId' => $article->getId(),
                        'amount' => 1,
                        'articleName' => $article->getName(),
                        'articlePrice' => $article->getPriceGross()
                    );
                }

                # store basket in session
                $_SESSION['basket'] = serialize($basket);
                # calculate price sum
                $priceSum = 0;
                foreach ($basket as $pos) {
                    $priceSum += $pos['amount'] * $pos['articlePrice'];
                }
                # generate json data for local storage
                $basketJson = json_encode($basket);
                $view = "views/_basket.php";
                break;

            case "delete":
                # check if article is already ordered
                $articleId = getRequestValue('id');
                $basket = null;
                $oldBasket = isset($_SESSION['basket']) ? unserialize($_SESSION['basket']) : null;
                foreach ($oldBasket as $basketPosition) {
                    if ($basketPosition['articleId'] == $articleId) {
                        if ($basketPosition['amount'] > 1) {
                            $basket[] = array(
                                'articleId' => $basketPosition['articleId'],
                                'amount' => $basketPosition['amount'] - 1,
                                'articleName' => $basketPosition['articleName'],
                                'articlePrice' => $basketPosition['articlePrice']
                            );
                        }
                    } else {
                        $basket[] = $basketPosition;
                    }
                }
                # store basket in session
                $_SESSION['basket'] = serialize($basket);
                # calculate price sum
                $priceSum = 0;
                if ($basket) {
                    foreach ($basket as $pos) {
                        $priceSum += $pos['amount'] * $pos['articlePrice'];
                    }
                }
                # generate json data for local storage
                $basketJson = json_encode($basket);
                $view = "views/_basket.php";
                break;

            case "reset":
                # clear the basket
                unset($_SESSION['basket']);
                $basket = null;
                $basketJson = json_encode($basket);
                $view = "views/_basket.php";
                break;
            
            case "order":
                # do order
                $appTitle = "Bestellung";
                require_once 'models/Order.php';
                $orderDate = new DateTime();
                # create order record
                $order = new Order(array(
                    'customerId' => $_SESSION["customerId"],
                    'orderDate' => $orderDate->format('Y-m-d'),
                    'status' => 1
                ));
                $order->save($db);
                $orderId = $db->lastInsertId();
                # create positions
                require_once 'models/Position.php';
                require_once 'models/Article.php';
                $basket = isset($_SESSION['basket']) ? unserialize($_SESSION['basket']) : null;
                foreach ($basket as $basketPosition) {
                    $article = new Article();
                    $article->findById($db, $basketPosition['articleId']);
                    $position = new Position(array(
                        'orderId' => $orderId,
                        'amount' => $basketPosition['amount'],
                        'articleId' => $basketPosition['articleId'],
                        'articlePriceNet' => $article->getPriceNet(),
                        'articleTax' => $article->getTax()
                    ));
                    $position->save($db);
                    unset($_SESSION['basket']);
                    $basket = null;
                    $basketJson = json_encode($basket);
                }
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    default:
        showFatalError("Module " . $module . " not found...");
        exit;
}

# load view
if (file_exists($view)) {
    require_once($view);
} else {
    showFatalError("View " . $view . " not found...");
}
?>