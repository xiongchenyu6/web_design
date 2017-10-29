<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 28/9/17
 * Time: 3:45 PM
 */

require_once (realpath(dirname(__FILE__) . "/./config.php"));

 $connect = function() use ($config){
    $hostname= $config["db"]["host"];
    $database= $config["db"]["dbname"];
    $username= $config["db"]["username"];
    $password= $config["db"]["password"];

    $conn=new mysqli($hostname, $username, $password,$database);
    $conn->set_charset("utf8");
    if($conn->connect_error)
        echo "Connection fails.";
    else{
        //echo "Connected!";
        return $conn;
    }
};

abstract class Model{

    protected $conn;
    protected $tableName;

    function __construct($tableName){
        $this->conn = $GLOBALS['connect']();
        $this->tableName = "`$tableName`";
    }
    public function byId($id){
        $stmt=$this->conn->prepare("select * from " . $this->tableName . " WHERE `id` = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }
    public function all(){
        $sql="SELECT * FROM " . $this->tableName;
        $result=$this->conn->query($sql);
        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>
