<?php

# Backenduser model

class Backenduser {

    private $id;
    private $loginName;
    private $loginPassword;
    private $firstname;
    private $lastname;

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
        $fullName = "#" . $this->id . " " . $this->loginName;
        return $fullName;
    }

    public function getId() {
        return $this->id;
    }

    public function getLoginName() {
        return $this->loginName;
    }

    public function getLoginPassword() {
        return $this->loginPassword;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLoginName($login) {
        $this->loginName = trim(strToLower($login));
    }

    public function setLoginPassword($password) {
        # hash the password if it isn´t already hashed
        if (substr($password, 0, 1) == "$" && strlen($password) > 50) {
            $this->loginPassword = $password;
        } else {
            $this->loginPassword = password_hash(trim($password), PASSWORD_DEFAULT);
        }
    }

    public function setFirstname($name) {
        $this->firstname = trim($name);
    }

    public function setLastname($name) {
        $this->lastname = trim($name);
    }

    public function findById($database, $id) {
        $stmt = $database->prepare('SELECT id, login_name, login_password, firstname, lastname FROM backendusers WHERE id=:id');
        $params = array('id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetch();
        $this->setId($result["id"]);
        $this->setLoginName($result["login_name"]);
        $this->setLoginPassword($result["login_password"]);
        $this->setFirstname($result["firstname"]);
        $this->setLastname($result["lastname"]);
    }

    public function save($database) {

        if ($this->id == "") {
            # no id given... create new record
            $stmt = $database->prepare('INSERT INTO backendusers (login_name, login_password, firstname, lastname) VALUES (:login_name, :login_password, :firstname, :lastname)');
            $params = array(
                'login_name' => $this->getLoginName(),
                'login_password' => $this->getLoginPassword(),
                'firstname' => $this->getFirstname(),
                'lastname' => $this->getLastname()
            );
        } else {
            # id given... update record
            $stmt = $database->prepare('UPDATE backendusers SET login_name=:login_name, login_password=:login_password, firstname=:firstname, lastname=:lastname WHERE id=:id');
            $params = array(
                'login_name' => $this->getLoginName(),
                'login_password' => $this->getLoginPassword(),
                'firstname' => $this->getFirstname(),
                'lastname' => $this->getLastname(),
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
        $stmt = $database->prepare('SELECT id, login_name, firstname, lastname FROM backendusers ORDER BY ' . $sortCriteria);
        try {
            $stmt->execute();
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }

    public static function verifyUser($database, $username, $userpassword) {
        $stmt = $database->prepare('SELECT id, login_name, login_password, firstname, lastname FROM backendusers WHERE login_name=:login_name');
        $params = array('login_name' => trim(strtolower($username)));
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetch();
        if ($result) {
            # user found
            var_dump($result);
            if (password_verify($userpassword, $result["login_password"])) {
                # password correct
                $_SESSION["backendUserVerified"] = true;
                $_SESSION["backendUserFullName"] = trim(trim($result["firstname"]) . " " . trim($result["lastname"]));
                return true;
            } else {
                # wrong password
                return false;
            }
        } else {
            # user unknown
            return false;
        }
    }

}
