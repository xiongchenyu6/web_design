<?php
require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class User extends Model
{

    public function checkUser($username, $password)
    {
        $password = sha1($password);
        $stmt = $this->conn->prepare("select * from " . $this->tableName . " where `username` = ? and `password` = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();
        $row = $this->fetchAssocStatement($stmt);
        $stmt->close();
        return $row;
    }

    public function createUser($userData)
    {
        $set = $this->createFields($userData);
        $sql = "INSERT INTO " . $this->tableName . "  SET $set;";
        $this->conn->query($sql);
        return $this->conn->insert_id;
    }

    public function findUser($id)
    {
        $stmt = $this->conn->prepare("select * from " . $this->tableName . " where `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $row = $this->fetchAssocStatement($stmt);
        $stmt->close();
        return $row;
    }

    public function updateUser()
    {

    }

    public function hashPassword()
    {
    }

}

?>