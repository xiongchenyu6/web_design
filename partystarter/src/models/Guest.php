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
     public function join($user_id,$host_id) {
         if(! $this->check($user_id,$host_id)){

         $stmt = $this->conn->prepare("insert " . $this->tableName . " (`user_id`,`host_id`) values(?,?);");
         $stmt->bind_param("ii", $user_id,$host_id);
         $stmt->execute();
         $insertId = $stmt->insert_id;
         $stmt->close();
         return $insertId;
         }
         else{
             return 0;
         }
     }
     public function check($user_id,$host_id) {

         $stmt = $this->conn->prepare("select * from " . $this->tableName . " where `user_id` = ? and `host_id` = ?");
         $stmt->bind_param("ii", $user_id,$host_id);
         $stmt->execute();
         $result = $stmt->get_result();
         $stmt->close();
         if ($result->num_rows > 0) {
             return true;
         } else{
             return false;
         }
     }
     public function findJoinListByUserId($userId){

         $stmt = $this->conn->prepare("select * from " . $this->tableName . " inner join `host` on guest.host_id = host.id where guest.user_id = ?");
         $stmt->bind_param("i", $userId);
         $stmt->execute();
         $result = $stmt->get_result();
         $stmt->close();
         $rows = [];
         while($row = $result->fetch_assoc())
         {
             $rows[] = $row;
         }
         return $rows;
     }
}