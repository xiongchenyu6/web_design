<?php
require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Food extends Model {

    public function updatePrice($id,$price) {
        // ...
        $sql = "UPDATE price FROM " . $this->usersTableName . " WHERE 'id' = $id";
        $result= $this->conn->query($sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

}
?>