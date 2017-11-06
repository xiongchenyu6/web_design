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
    public function postJoin($host_id){
        $sql = "select * from `guest` where `host_id` = $host_id;";
        $result= $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        require_once(MODULES_PATH.'./Host.php');
        $host = new Host('host');
        $thisHost= $host->findById($host_id);
        if(sizeof($rows) >= $thisHost['maximum']){
            $host->closeHost($host_id);
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
     public function findGuestListByHostId($hostId){
         $stmt = $this->conn->prepare("select * from " . $this->tableName . " inner join `user` on guest.user_id = user.id where host_id = ?");
         $stmt->bind_param("i", $hostId);
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
     public function setCommentAndRate($user_id,$host_id,$comment,$rate){
         $stmt = $this->conn->prepare("update " . $this->tableName . " set `comment` = ?, `rate` = ? where `user_id` = ? and `host_id` = ?;");
         $stmt->bind_param("siii", $comment,$rate,$user_id,$host_id);
         $stmt->execute();
         $result = $stmt->get_result();
         $stmt->close();
         if ($result->num_rows > 0) {
             return true;
         } else{
             return false;
         }
     }
     public function leaveHost($id){
         $stmt = $this->conn->prepare("delete " . $this->tableName . " where `id` = ?;");
         $stmt->bind_param("i",$id);
         $stmt->execute();
         $stmt->close();
     }

    public function payHost($id){
        $stmt = $this->conn->prepare("update " . $this->tableName . " SET `payment`= true where `id` = ?;");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->close();
    }
}