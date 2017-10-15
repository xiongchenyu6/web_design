<?php

require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Meal extends Model {

    public function createMeal() {
        $sql = "insert " . $this->tableName . " () values();";
        $result= $this->conn->query($sql);
        if(!$result){
            return null;
        }else{
            $sql="SELECT `id` FROM ". $this->tableName. " WHERE id = (SELECT MAX(`id`) FROM " . $this->tableName .")";
            $result= $this->conn->query($sql);
            return $result->fetch_assoc();
        }
    }
}
?>