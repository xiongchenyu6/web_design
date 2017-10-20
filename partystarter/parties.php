<?php
require_once(realpath(dirname(__FILE__) . "/src/config.php"));
require_once(TEMPLATES_PATH . "/header.php");
require_once(TEMPLATES_PATH . "/parties-body.php");
require_once(TEMPLATES_PATH . "/footer.php");
require_once(MODULES_PATH . "/User.php");
$user = new User('user');
print_r($user->byId(1));
?>
