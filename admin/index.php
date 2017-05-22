<?php

# backend maincontroller index.php

session_start();

require_once '../inc/config.php';
require_once '../inc/shopFunctions.php';

$module = ucfirst(strToLower(getRequestValue("module")));
$action = strToLower(getRequestValue("action"));
$sortCriteria = getRequestValue("sort");

# setting for default module and default action
if (!$module) {
    $module = "Article";
}
if (!$action) {
    $action = "list";
}

# modify module & action if user unauthenticated
if (!isset($_SESSION["backendUserVerified"]) || $_SESSION["backendUserVerified"] == false) {
    $module = "Login";
    $action = "do";
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

switch ($module) {

    case "Backenduser":

        switch ($action) {

            case "list":
                $allBackendUsers = Backenduser::findAll($db, $sortCriteria);
                $appTitle = "Benutzer - Liste";
                break;

            case "edit":
                if (getRequestValue("submit") == "Speichern") {
                    $user = new Backenduser($_POST);
                    $user->save($db);
                    header("location: index.php?module=backenduser&action=list");
                } else {
                    $recordId = getRequestValue("id");
                    if ($recordId) {
                        $user = new Backenduser($_POST);
                        $user->findById($db, $recordId);
                    } else {
                        $user = new Backenduser($_POST);
                    }
                    $appTitle = "Benutzer - Details";
                }
                $recordId = getRequestValue("id");
                if ($recordId) {
                    $user = new Backenduser($_POST);
                    $user->findById($db, $recordId);
                } else {
                    $user = new Backenduser($_POST);
                }
                $appTitle = "Benutzer - Details";
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Articlegroup":

        switch ($action) {

            case "list":
                $allArticlegroups = Articlegroup::findAll($db, $sortCriteria);
                $appTitle = "Artikelgruppen - Liste";
                break;

            case "edit":
                if (getRequestValue("submit") == "Speichern") {
                    $articlegroup = new Articlegroup($_POST);
                    $articlegroup->save($db);
                    header("location: index.php?module=articlegroup&action=list");
                } else {
                    $recordId = getRequestValue("id");
                    if ($recordId) {
                        $articlegroup = new Articlegroup($_POST);
                        $articlegroup->findById($db, $recordId);
                    } else {
                        $articlegroup = new Articlegroup($_POST);
                    }
                    $appTitle = "Artikelgruppe - Details";
                }
                $recordId = getRequestValue("id");
                if ($recordId) {
                    $articlegroup = new Articlegroup($_POST);
                    $articlegroup->findById($db, $recordId);
                } else {
                    $articlegroup = new Articlegroup($_POST);
                }
                $appTitle = "Artikelgruppe - Details";
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Article":

        switch ($action) {

            case "list":
                $allArticles = Article::findAll($db, $sortCriteria);
                $appTitle = "Artikel - Liste";
                break;

            case "edit":
                if (getRequestValue("submit") == "Speichern") {
                    $article = new Article($_POST);
                    $article->save($db);
                    header("location: index.php?module=article&action=list");
                } else {
                    require_once("models/Articlegroup.php");
                    $allArticleGroups = Articlegroup::findAll($db, "groupname");
                    $recordId = getRequestValue("id");
                    if ($recordId) {
                        $article = new Article($_POST);
                        $article->findById($db, $recordId);
                    } else {
                        $article = new Article($_POST);
                    }
                    $appTitle = "Artikel - Details";
                }
                $recordId = getRequestValue("id");
                if ($recordId) {
                    $article = new Article($_POST);
                    $article->findById($db, $recordId);
                } else {
                    $article = new Article($_POST);
                }
                $appTitle = "Artikel - Details";
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Customer":

        switch ($action) {

            case "list":
                $allCustomers = Customer::findAll($db, $sortCriteria);
                $appTitle = "Kunden - Liste";
                break;

            case "edit":
                if (getRequestValue("submit") == "Speichern") {
                    $customer = new Customer($_POST);
                    $customer->save($db);
                    header("location: index.php?module=customer&action=list");
                } else {
                    $recordId = getRequestValue("id");
                    if ($recordId) {
                        $customer = new Customer($_POST);
                        $customer->findById($db, $recordId);
                    } else {
                        $customer = new Customer($_POST);
                    }
                    $appTitle = "Artikel - Details";
                }
                $recordId = getRequestValue("id");
                if ($recordId) {
                    $customer = new Customer($_POST);
                    $customer->findById($db, $recordId);
                } else {
                    $customer = new Customer($_POST);
                }
                $appTitle = "Kunde - Details";
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Order":

        switch ($action) {

            case "list":
                $allOrders = Order::findAll($db, $sortCriteria);
                $appTitle = "Bestellungen - Liste";
                break;

            case "edit":
                if (getRequestValue("submit") == "Speichern") {
                    $order = new Order($_POST);
                    $order->save($db);
                    header("location: index.php?module=order&action=list");
                } else {
                    $recordId = getRequestValue("id");
                    if ($recordId) {
                        $order = new Order($_POST);
                        $order->findById($db, $recordId);
                        require_once("models/Position.php");
                        $orderpositions = Position::findByOrderId($db, $recordId, "id");
                        $orderPriceTotal = Position::getPriceSumGrossByOrderId($db, $recordId);
                    } else {
                        $order = new Order($_POST);
                        # new order isn´t available
                    }
                    $appTitle = "Bestellung - Details";
                }
                $recordId = getRequestValue("id");
                if ($recordId) {
                    $order = new Order($_POST);
                    $order->findById($db, $recordId);
                } else {
                    $order = new Order($_POST);
                }
                $appTitle = "Kunde - Details";
                break;

            default:
                showFatalError("Action " . $action . " not found...");
        }
        break;

    case "Login":

        switch ($action) {

            case "do":
                $appTitle = "Anmeldung";
                if (getRequestValue("submit") == "Anmelden") {
                    require_once 'models/Backenduser.php';
                    $username = strToLower(getRequestValue("loginName"));
                    $userpassword = getRequestValue("loginPassword");
                    $result = Backenduser::verifyUser($db, $username, $userpassword);
                    if ($result) {
                        header("location: index.php");
                    }
                }
                break;

            case "exit":
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