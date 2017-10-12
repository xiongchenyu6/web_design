<?php
require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class User extends Model {

    public function CheckUsername($username) {
        // ...
        $sql = "SELECT Username FROM " . $this->usersTableName . " WHERE 'username' = $username";
        return false;
    }

    public function createUser($username, $email, $password, $wechat) {
        $encrptPassword = sha1($password);
        $sql = "insert `user`(`username`,`password`,`email`,`wechat`,`type`) values('$username','$encrptPassword','$email','$wechat', 1 );";
        $result= $GLOBALS['conn']->query($sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    public function updateUser(){

    }
    public function findUser(){

    }

    public function hashPassword(){

    }

}
?>