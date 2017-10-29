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
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
        $stmt->close();
        return $row;
    }

    public function createUser($username, $password, $email, $profile_photo, $self_description)
    {
        $stmt = $this->conn->prepare("insert " . $this->tableName . " (`username`,`password`,`email`,`profile_photo`,`self_description`) values(?,?,?,?,?);");
        $stmt->bind_param("sssss", $username, $password, $email, $profile_photo, $self_description);
        $stmt->execute();
        $message = $stmt->error;
        $stmt->close();
        return $message;
    }

    public function updateUser()
    {

    }

    public function findUser($email)
    {
    }

    public function hashPassword()
    {
    }

}

?>