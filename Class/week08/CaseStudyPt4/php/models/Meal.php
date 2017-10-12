<?php

require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Meal extends Model {

    public function createMeal() {
        $sql = "insert " . $this->tableName . " () values();";
        $result= $this->conn->query($sql);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }
}

?>