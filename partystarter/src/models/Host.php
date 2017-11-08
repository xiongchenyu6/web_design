<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 26/10/17
 * Time: 11:05 PM
 */

require_once(realpath(dirname(__FILE__) . "/../connector.php"));

class Host extends Model
{
    public function createHost($userData)
    {
        $set = $this->createFields($userData);
        $sql = "INSERT INTO " .$this->tableName. "  SET $set";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function findHostListByUserId($userId){
        $stmt = $this->conn->prepare("select * from " . $this->tableName . " where `user_id` = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->store_result();
        $rows = [];
        while($row = $this->fetchAssocStatement($stmt))
        {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }
    public function closeHost($host_id){
        $stmt = $this->conn->prepare("update " . $this->tableName . " SET `avalaible`= false where `id` = ?;");
        $stmt->bind_param("i",$host_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->close();
    }
}