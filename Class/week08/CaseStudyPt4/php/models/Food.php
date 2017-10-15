<?php
require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Food extends Model {

    public function updatePrice($id,$price) {
        // ...
        $sql = "UPDATE ". $this->tableName ." SET `price` = $price" . " WHERE `id` = $id";
        $result= $this->conn->query($sql);
        var_dump($result);
        if(!$result){
            return false;
        }else{
            return true;
        }
    }

    public function sumByProduct() {
        $sql = "SELECT food.id,name,ROUND(SUM(price*quantity/100),2) as `total price` FROM `order` INNER JOIN food ON order.food_id = food.id group by food.id";
        $result= $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }

    public function quantityByProduct() {
        $sql = "SELECT food.id,name,SUM(quantity) as `total quantity` FROM `order` INNER JOIN food ON order.food_id = food.id group by food.id";
        $result= $this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }

}
?>