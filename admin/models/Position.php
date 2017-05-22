<?php

# Position model

class Position {

    private $id;

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

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public static function findByOrderId($database, $id, $sortCriteria) {
        if (!isset($sortCriteria)) {
            $sortCriteria = "id";
        }
        $stmt = $database->prepare('select positions.id, amount, article_id, article_price_net, article_tax, articles.name, articles.image_url, article_price_net * amount + round((article_price_net / 100 * amount * article_tax),2) as price_gross from positions join articles on article_id=articles.id WHERE order_id=:order_id ORDER BY ' . $sortCriteria);
        $params = array(
            'order_id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function getPriceSumGrossByOrderId($database, $id) {
        $stmt = $database->prepare('SELECT SUM(article_price_net * amount + ROUND((article_price_net / 100 * amount * article_tax),2)) AS price_sum_gross FROM positions WHERE order_id=:order_id');
        $params = array(
            'order_id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

}
