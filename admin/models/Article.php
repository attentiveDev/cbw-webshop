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
        return $this->priceGross;
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
        $stmt = $database->prepare('SELECT articles.id, articlegroup_id, articlegroups.groupname as articlegroup_name, name, articles.description, price_net, tax, image_url FROM articles JOIN articlegroups ON articlegroup_id=articlegroups.id WHERE articles.id=:id');
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

    public function save($database) {

        if ($this->id == "") {
            # no id given... create new record
            $stmt = $database->prepare('INSERT INTO articles (articlegroup_id, name, description, price_net, tax, image_url) VALUES (:articlegroup_id, :name, :description, :price_net, :tax, :image_url)');
            $params = array(
                'articlegroup_id' => $this->getArticlegroupId(),
                'name' => $this->getName(),
                'description' => $this->getDescription(),
                'price_net' => $this->getPriceNet(),
                'tax' => $this->getTax(),
                'image_url' => $this->getImageUrl()
            );
        } else {
            # id given... update record
            $stmt = $database->prepare('UPDATE articles SET articlegroup_id=:articlegroup_id, name=:name, description=:description, price_net=:price_net, tax=:tax, image_url=:image_url WHERE id=:id');
            $params = array(
                'articlegroup_id' => $this->getArticlegroupId(),
                'name' => $this->getName(),
                'description' => $this->getDescription(),
                'price_net' => $this->getPriceNet(),
                'tax' => $this->getTax(),
                'image_url' => $this->getImageUrl(),
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
        $stmt = $database->prepare('SELECT articles.id, articlegroup_id, articlegroups.groupname as articlegroup_name, price_net + round((price_net / 100 * tax),2) as price_gross, articles.description, name, price_net, image_url FROM articles JOIN articlegroups ON articlegroup_id=articlegroups.id ORDER BY ' . $sortCriteria);
        try {
            $stmt->execute();
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

}
