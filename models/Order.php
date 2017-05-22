<?php

# Order model

class Order {

    private $id;
    private $customerId;
    private $status;
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

    public function getCustomerId() {
        return $this->customerId;
    }

    public function getStatus() {
        return $this->status;
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
    
    public function setOrderDate($data) {
        $this->orderDate = $data;
    }

    public function save($database) {

        if ($this->id == "") {
            # no id given... create new record
            $stmt = $database->prepare('INSERT INTO orders (customer_id, order_date, status) VALUES (:customer_id, :order_date, :status)');
            $params = array(
                'customer_id' => $this->getCustomerId(),
                'order_date' => $this->getOrderDate(),
                'status' => $this->getStatus()
            );
        } else {
            # id given... update record
            $stmt = $database->prepare('UPDATE orders SET customer_id=:customer_id, order_date=:order_date, status=:status WHERE id=:id');
            $params = array(
                'customer_id' => $this->getCustomerId(),
                'order_date' => $this->getOrderDate(),
                'status' => $this->getStatus(),
                'id' => $this->getId());
        }
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
    }
    
    public static function findAllByCustomer($database, $customerId) {
        $stmt = $database->prepare('SELECT amount, article_price_net, article_tax, positions.id, orders.id as order_id, orders.status, orders.customer_id, orders.order_date, articles.name FROM positions JOIN orders ON order_id=orders.id JOIN articles ON article_id=articles.id WHERE orders.customer_id=:customer_id ORDER BY orders.id, orders.order_date, positions.id');
        $params = array(
                'customer_id' => $customerId
                );
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

}
