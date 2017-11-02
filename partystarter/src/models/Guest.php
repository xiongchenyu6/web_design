<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 26/10/17
 * Time: 11:05 PM
 */

require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Guest extends Model
{
     public function join($user_id,$host_id){

         $stmt = $this->conn->prepare("insert " . $this->tableName . " (`user_id`,`host_id`) values(?,?);");
         $stmt->bind_param("ii", $user_id,$host_id);
         $stmt->execute();
         $insertId = $stmt->insert_id;
         $stmt->close();
         return $insertId;
     }
}