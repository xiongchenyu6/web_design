<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 28/9/17
 * Time: 3:45 PM
 */

require_once(realpath(dirname(__FILE__) . "/./config.php"));

$connect = function () use ($config) {
    $hostname = $config["db"]["host"];
    $database = $config["db"]["dbname"];
    $username = $config["db"]["username"];
    $password = $config["db"]["password"];

    $conn = new mysqli($hostname, $username, $password, $database);
    $conn->set_charset("utf8");
    if ($conn->connect_error)
        echo "Connection fails.";
    else {
        //echo "Connected!";
        return $conn;
    }
};

abstract class Model
{

    protected $conn;
    protected $tableName;

    function __construct($tableName)
    {
        $this->conn = $GLOBALS['connect']();
        $this->tableName = "`$tableName`";
    }

    public function byId($id)
    {
        $stmt = $this->conn->prepare("select * from " . $this->tableName . " WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $row = $this->fetchAssocStatement($stmt);
        $stmt->close();
        return $row;
    }

    public function all()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function createFields($usrData){
        $count= 0;
        $fields = '';
        foreach($usrData as $col => $val) {
            if($col != 'submit'){
                if ($count++ != 0) $fields .= ', ';
                $col = mysqli_real_escape_string($this->conn,$col);
                $val = mysqli_real_escape_string($this->conn,$val);
                $fields .= "`$col` = '$val'";
            }
        }
        return $fields;
    }
    function fetchAssocStatement($stmt)
    {
        if($stmt->num_rows>0)
        {
            $result = array();
            $md = $stmt->result_metadata();
            $params = array();
            while($field = $md->fetch_field()) {
                $params[] = &$result[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $params);
            if($stmt->fetch())
                return $result;
        }

        return null;
    }
}

?>
