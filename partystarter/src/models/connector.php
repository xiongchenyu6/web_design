<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 28/9/17
 * Time: 3:45 PM
 */

require_once (realpath(dirname(__FILE__) . "/../config.php"));

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
}

?>
