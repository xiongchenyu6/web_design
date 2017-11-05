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
        $result = $stmt->get_result();
        $stmt->close();
        $rows = [];
        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }
    public function closeHost($host_id){
        $stmt = $this->conn->prepare("update " . $this->tableName . " ( SET `avalaible`= false where `id` = $host_id;");
        $stmt->bind_param("ii",$host_id);
        $stmt->execute();
        $stmt->close();
    }
}