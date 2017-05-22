<?php

# Order model

class Order {

    private $id;
    private $customerId;
    private $status;
    private $salutation;
    private $firstname;
    private $lastname;
    private $orderDate;

    const ORDERSTATE_NEW = 1;
    const ORDERSTATE_READY = 2;
    const ORDERSTATE_SHIPPED = 3;

    private static $orderStateList = array(
        99 => '',
        self::ORDERSTATE_NEW => 'Neu',
        self::ORDERSTATE_READY => 'Versandbereit',
        self::ORDERSTATE_SHIPPED => 'Versendet',
    );

    public function __construct(array $data = array()) {
        if ($data) {
            $this->setData($data);
        }
    }

    public function setData($data) {
        if ($data) {
            foreach ($data as $key => $value) {
                $setterName = 'set' . ucfirst($key);
                if (method_exists($this, $setterName)) {
                    $this->$setterName($value);
                }
            }
        }
    }

    public function __toString() {
        $fullName = "#" . $this->id . " " . $this->salutation . " " . $this->firstname . " " . $this->lastname;
        return $fullName;
    }

    public function getId() {
        return $this->id;
    }

    public function getcustomerId() {
        return $this->customerId;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getSalutation() {
        return $this->salutation;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }
    
    public function getOrderDate() {
        return $this->orderDate;
    }

    public function getStatusText() {
        # virtual attribute for status code conversion to status text
        if (isset($this->status)) {
            return(self::status2String($this->status));
        } else {
            return ('');
        }
    }

    public static function status2String($status) {
        if (isset(self::$orderStateList[$status])) {
            return self::$orderStateList[$status];
        }
        return $status;
    }

    public static function getStatusList() {
        # used for building drop-down menue
        return self::$orderStateList;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCustomerId($data) {
        $this->customerId = $data;
    }

    public function setStatus($data) {
        $this->status = $data;
    }

    public function setSalutation($data) {
        $this->salutation = trim($data);
    }

    public function setFirstname($data) {
        $this->firstname = trim($data);
    }

    public function setLastname($data) {
        $this->lastname = trim($data);
    }
    
    public function setOrderDate($data) {
        $this->orderDate = $data;
    }

    public function findById($database, $id) {
        $stmt = $database->prepare('SELECT orders.id, status, order_date, customer_id, customers.salutation, customers.firstname, customers.lastname FROM orders JOIN customers ON customer_id=customers.id WHERE orders.id=:id');
        $params = array('id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetch();
        $this->setId($result["id"]);
        $this->setCustomerId($result["customer_id"]);
        $this->setOrderDate($result["order_date"]);
        $this->setSalutation($result["salutation"]);
        $this->setFirstname($result["firstname"]);
        $this->setLastname($result["lastname"]);
        $this->setStatus($result["status"]);
    }

    public function save($database) {

        if ($this->id == "") {
            # no id given... create new record
            $stmt = $database->prepare('INSERT INTO orders (customer_id, status) VALUES (:customer_id, :status)');
            $params = array(
                'customer_id' => $this->getcustomerId(),
                'status' => $this->getStatus()
            );
        } else {
            # id given... update record
            $stmt = $database->prepare('UPDATE orders SET customer_id=:customer_id, status=:status WHERE id=:id');
            $params = array(
                'customer_id' => $this->getcustomerId(),
                'status' => $this->getStatus(),
                'id' => $this->getId());
        }
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
    }

    public static function findAll($database, $sortCriteria) {
        if (!isset($sortCriteria)) {
            $sortCriteria = "id";
        }
        $stmt = $database->prepare('SELECT orders.id, order_date, status, customer_id, customers.salutation, customers.firstname, customers.lastname FROM orders JOIN customers ON customer_id=customers.id ORDER BY ' . $sortCriteria);
        try {
            $stmt->execute();
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

}
