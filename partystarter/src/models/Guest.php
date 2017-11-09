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
    public function join($user_id, $host_id)
    {
        if (!$this->check($user_id, $host_id)) {

            $stmt = $this->conn->prepare("insert " . $this->tableName . " (`user_id`,`host_id`) values(?,?);");
            $stmt->bind_param("ii", $user_id, $host_id);
            $stmt->execute();
            $insertId = $stmt->insert_id;
            $stmt->close();
            return $insertId;
        } else {
            return 0;
        }
    }

    public function check($user_id, $host_id)
    {

        $stmt = $this->conn->prepare("select * from " . $this->tableName . " where `user_id` = ? and `host_id` = ?");
        $stmt->bind_param("ii", $user_id, $host_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function postJoin($host_id)
    {
        $sql = "select * from `guest` where `host_id` = $host_id;";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        require_once(MODULES_PATH . './Host.php');
        $host = new Host('host');
        $thisHost = $host->findById($host_id);
        if (sizeof($rows) >= $thisHost['maximum']) {
            $host->closeHost($host_id);
        }
    }

    public function findJoinListByUserId($userId)
    {

        $stmt = $this->conn->prepare("select * from " . $this->tableName . " inner join `host` on guest.host_id = host.id where guest.user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->store_result();
        $rows = [];
        while ($row = $this->fetchassocstatement($stmt)) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    public function findGuestListByHostId($hostId)
    {
        $stmt = $this->conn->prepare("select * from " . $this->tableName . " inner join `user` on guest.user_id = user.id where host_id = ?");
        $stmt->bind_param("i", $hostId);
        $stmt->execute();
        $stmt->store_result();
        $rows = [];
        while ($row = $this->fetchassocstatement($stmt)) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    public function setCommentAndRate($user_id, $host_id, $comment, $rate)
    {
        $stmt = $this->conn->prepare("update " . $this->tableName . " set `comment` = ?, `rate` = ? where `user_id` = ? and `host_id` = ?;");
        $stmt->bind_param("siii", $comment, $rate, $user_id, $host_id);
        $stmt->execute();
        $stmt->store_result();
        $row = $this->fetchassocstatement($stmt);
        $stmt->close();
        return true;
    }

    public function leaveHost($id, $user_id)
    {
        $stmt = $this->conn->prepare("delete from " . $this->tableName . " where `host_id` = ? and `user_id` = ?;");
        $stmt->bind_param("ii", $id, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->close();
    }

    public function payHost($id, $user_id)
    {
        $stmt = $this->conn->prepare("update " . $this->tableName . " SET `payment`= true where `host_id` = ? and `user_id` = ?;");
        $stmt->bind_param("ii", $id, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->close();

        require_once(MODULES_PATH . "/User.php");
        $user = new User("user");
        $endUser = $user->byId($user_id);

        $to = $endUser['email'];
        $subject = 'Payment confirmation';
        $message = 'fd';
        $headers = 'From: f35ee@localhost' . "\r\n" .
            'Reply-To: f35ee@localhost' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers, '-ff35ee@localhost');
    }
}