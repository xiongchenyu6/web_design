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
    public function createHost($user_id,$description,$time,$region,$place,$price,$maximum,$event_name,$theme,$event_name)
    {
        $stmt = $this->conn->prepare("insert " . $this->tableName . " (`user_id`,`description`,`time`,`region`,`place`,`maximum`,`theme`,`event_name`) values(?,?,?,?,?,?,?,?);");
        $stmt->bind_param("issssissss", $user_id,$description,$time,$region,$place,$price,$maximum,$event_name,$theme,$event_name);
        $stmt->execute();
        $insertId = $stmt->insert_id;
        $stmt->close();
        return $insertId;
    }
    public function closeHost(){}
}