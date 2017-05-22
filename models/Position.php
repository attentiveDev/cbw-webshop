<?php

# Position model

class Position {

    private $id;
    private $orderId;
    private $amount;
    private $articleId;
    private $articlePriceNet;
    private $articleTax;

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
    
    # getter

    public function getId() {
        return $this->id;
    }
    
    public function getOrderId() {
        return $this->orderId;
    }
    
    public function getAmount() {
        return $this->amount;
    }
    
    public function getArticleId() {
        return $this->articleId;
    }
    
    public function getArticlePriceNet() {
        return $this->articlePriceNet;
    }
    
    public function getArticleTax() {
        return $this->articleTax;
    }

    # setter
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setOrderId($id) {
        $this->orderId = $id;
    }
    
    public function setAmount($amount) {
        $this->amount = $amount;
    }
    
    public function setArticleId($id) {
        $this->articleId = $id;
    }
    
    public function setArticlePriceNet($price) {
        $this->articlePriceNet = $price;
    }
    
    public function setArticleTax($tax) {
        $this->articleTax = $tax;
    }

    public function save($database) {

        if ($this->id == "") {
            # no id given... create new record
            $stmt = $database->prepare('INSERT INTO positions (order_id, amount, article_id, article_price_net, article_tax) VALUES (:order_id, :amount, :article_id, :article_price_net, :article_tax)');
            $params = array(
                'order_id' => $this->getOrderId(),
                'amount' => $this->getAmount(),
                'article_id' => $this->getArticleId(),
                'article_price_net' => $this->getArticlePriceNet(),
                'article_tax' => $this->getArticleTax()
            );
        } 
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
    }

}
