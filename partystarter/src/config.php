<?php

session_start();

$config = array(
    "db" => array(
        "host" => "127.0.0.1",
        "dbname" => "partystarter",
        "username" => "partystarter",
        "password" => "partystarter",
    ),
    "urls" => array(
        "baseUrl" => "http://localhost"
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
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRCT);

?>
