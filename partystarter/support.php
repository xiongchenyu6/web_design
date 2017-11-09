<?php
require_once(realpath(dirname(__FILE__) . "/src/render.php"));

$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
$renderLayoutWithContentFile("support-body.php");
?>
<link href="<?php echo $baseUrl ?>/public/css/support.css" rel="stylesheet"/>
