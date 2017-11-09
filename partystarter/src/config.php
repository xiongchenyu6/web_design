<?php

session_start();

$config = array(
    "db" => array(
        "host" => "127.0.0.1",
        "dbname" => "f35ee",
        "username" => "f35ee",
        "password" => "f35ee",
    ),
    "urls" => array(
        "baseUrl" => "http://localhost:8000"
     //   "baseUrl" => "http://192.168.56.2/f35ee/partystarter"
    ),

    "paths" => array(
        "uploads" => "/uploads",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/public/img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/public/img/layout"
        )
    )
);

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));



defined("MODULES_PATH")
or define("MODULES_PATH", realpath(dirname(__FILE__) . '/models'));


ini_set('display_errors',1);
error_reporting(E_ALL);

?>
