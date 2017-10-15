<?php
require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Order extends Model {


    public function createOrder($mealId,$orders) {
        foreach ($orders as $order){
            $food_id = $order['id'];
            $quantity = $order['quantity'];
            $sql = "insert into " .$this->tableName. " (`meal_id`,`food_id`,`quantity`) values('$mealId','$food_id','$quantity');";
            $result= $this->conn->query($sql);
        }

    }
}
?>