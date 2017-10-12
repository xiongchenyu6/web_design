<?php
require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Order extends Model {


    public function createOrder($orders) {
        $sql="SELECT `id` FROM `meal` WHERE id = (SELECT MAX(`id`) FROM `meal`)"

        foreach ($ordrs as $order){
            $food_id = $order->id
            $quantity = $order->quantity
            $sql = "inserlt " .$this->tableName. " (`meal_id`,`food_id`,`quantity`) values('$username','$food_id','$quantity');"

            $result= $this->conn->query($sql);
            if(!$result){
                break;
            }else{
                return true;
            }
        }

    }
}
?>