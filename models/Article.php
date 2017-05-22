<?php

# Article model

class Article {

    private $id;
    private $articlegroupId;
    private $articlegroupName;
    private $name;
    private $description;
    private $priceNet;
    private $priceGross;
    private $tax;
    private $imageUrl;

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
        $fullName = "#" . $this->id . " " . $this->name;
        return $fullName;
    }

    public function getId() {
        return $this->id;
    }

    public function getArticlegroupId() {
        return $this->articlegroupId;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPriceNet() {
        return $this->priceNet;
    }

    public function getPriceGross() {
        return round($this->priceNet / 100 * $this->tax + $this->priceNet, 2);
    }

    public function getTax() {
        return $this->tax;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getArticlegroupName() {
        return $this->articlegroupName;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setArticlegroupId($group) {
        $this->articlegroupId = trim($group);
    }

    public function setArticlegroupName($groupname) {
        $this->articlegroupName = trim($groupname);
    }

    public function setName($name) {
        $this->name = trim($name);
    }

    public function setDescription($text) {
        $this->description = trim($text);
    }

    public function setPriceNet($price) {
        $this->priceNet = round(floatval(str_replace(",", ".", $price)), 2);
    }

    public function setPriceGross($price) {
        $this->priceGross = round(floatval(str_replace(",", ".", $price)), 2);
    }

    public function setTax($tax) {
        $this->tax = intval($tax);
    }

    public function setImageUrl($url) {
        $this->imageUrl = trim($url);
    }

    public function findById($database, $id) {
        $stmt = $database->prepare('SELECT articles.id, articlegroup_id, articlegroups.groupname as articlegroup_name, name, articles.description, price_net, tax, price_net + round((price_net / 100 * tax),2) as price_gross, image_url FROM articles JOIN articlegroups ON articlegroup_id=articlegroups.id WHERE articles.id=:id');
        $params = array('id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetch();
        $this->setId($result["id"]);
        $this->setArticlegroupId($result["articlegroup_id"]);
        $this->setArticlegroupName($result["articlegroup_name"]);
        $this->setName($result["name"]);
        $this->setDescription($result["description"]);
        $this->setPriceNet($result["price_net"]);
        $this->setTax($result["tax"]);
        $this->setImageUrl($result["image_url"]);
    }

    public static function findAll($database, $sortCriteria) {
        if (!isset($sortCriteria)) {
            $sortCriteria = "id";
        }
        $stmt = $database->prepare('SELECT articles.id, articlegroup_id, articlegroups.groupname as articlegroup_name, price_net + round((price_net / 100 * tax),2) as price_gross, articles.description, name, price_net, image_url FROM articles JOIN articlegroups ON articlegroup_id=articlegroups.id ORDER BY ' . $sortCriteria);
        try {
            $stmt->execute();
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }
    
    public function findByGroup($database, $id) {
        $stmt = $database->prepare('SELECT id, articlegroup_id, name, description, price_net, tax, price_net + round((price_net / 100 * tax),2) as price_gross, image_url FROM articles WHERE articlegroup_id=:id');
        $params = array('id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

}
