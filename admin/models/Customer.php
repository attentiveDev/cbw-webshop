<?php

# Customer model

class Customer {

    private $id;
    private $salutation;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $address;
    private $zipcode;
    private $city;
    private $phone;

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
        $fullName = "#" . $this->id . " " . $this->firstname . " " . $this->lastname;
        return $fullName;
    }

    public function getId() {
        return $this->id;
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

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function getCity() {
        return $this->city;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($data) {
        $this->email = trim(strToLower($data));
    }

    public function setPassword($data) {
        # hash the password if it isn´t already hashed
        if (substr($data, 0, 1) == "$" && strlen($data) > 50) {
            $this->password = $data;
        } else {
            $this->password = password_hash(trim($data), PASSWORD_DEFAULT);
        }
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

    public function setAddress($data) {
        $this->address = trim($data);
    }

    public function setZipcode($data) {
        $this->zipcode = trim($data);
    }

    public function setCity($data) {
        $this->city = trim($data);
    }

    public function setPhone($data) {
        $this->phone = trim($data);
    }

    public function findById($database, $id) {
        $stmt = $database->prepare('SELECT id, salutation, firstname, lastname, email, password, address, zipcode, city, phone FROM customers WHERE id=:id');
        $params = array('id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetch();
        $this->setId($result["id"]);
        $this->setSalutation($result["salutation"]);
        $this->setFirstname($result["firstname"]);
        $this->setLastname($result["lastname"]);
        $this->setEmail($result["email"]);
        $this->setPassword($result["password"]);
        $this->setAddress($result["address"]);
        $this->setZipcode($result["zipcode"]);
        $this->setCity($result["city"]);
        $this->setPhone($result["phone"]);
    }

    public function save($database) {

        if ($this->id == "") {
            # no id given... create new record
            $stmt = $database->prepare('INSERT INTO customers (salutation, firstname, lastname, email, password, address, zipcode, city, phone) VALUES (:salutation, :firstname, :lastname, :email, :password, :address, :zipcode, :city, :phone)');
            $params = array(
                'salutation' => $this->getSalutation(),
                'firstname' => $this->getFirstname(),
                'lastname' => $this->getLastname(),
                'email' => $this->getEmail(),
                'password' => $this->getPassword(),
                'address' => $this->getAddress(),
                'zipcode' => $this->getZipcode(),
                'city' => $this->getCity(),
                'phone' => $this->getPhone()
            );
        } else {
            # id given... update record
            $stmt = $database->prepare('UPDATE customers SET salutation=:salutation, firstname=:firstname, lastname=:lastname, email=:email, password=:password, address=:address, zipcode=:zipcode, city=:city, phone=:phone WHERE id=:id');
            $params = array(
                'salutation' => $this->getSalutation(),
                'firstname' => $this->getFirstname(),
                'lastname' => $this->getLastname(),
                'email' => $this->getEmail(),
                'password' => $this->getPassword(),
                'address' => $this->getAddress(),
                'zipcode' => $this->getZipcode(),
                'city' => $this->getCity(),
                'phone' => $this->getPhone(),
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
        $stmt = $database->prepare('SELECT id, salutation, firstname, lastname, email, zipcode, city FROM customers ORDER BY ' . $sortCriteria);
        try {
            $stmt->execute();
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

}
