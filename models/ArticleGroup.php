<?php

# Articlegroup model

class Articlegroup {
    
    private $id;
    private $groupname;
    private $description;

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
        $fullName = "#" . $this->id . " " . $this->groupname;
        return $fullName;
    }

    public function getId() {
        return $this->id;
    }

    public function getGroupname() {
        return $this->groupname;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setGroupname($name) {
        $this->groupname = trim($name);
    }

    public function setDescription($name) {
        $this->description = trim($name);
    }

    public static function findAll($database) {
        $stmt = $database->prepare('SELECT id, groupname, description FROM articlegroups ORDER BY groupname');
        try {
            $stmt->execute();
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetchAll();
        return $result;
    }
    
    public function findById($database, $id) {
        $stmt = $database->prepare('SELECT id, groupname, description FROM articlegroups WHERE id=:id');
        $params = array('id' => $id);
        try {
            $stmt->execute($params);
        } catch (PDOException $error) {
            showFatalError("Database Error: " . $error->getMessage());
        }
        $result = $stmt->fetch();
        $this->setId($result["id"]);
        $this->setGroupname($result["groupname"]);
        $this->setDescription($result["description"]);
    }
}
