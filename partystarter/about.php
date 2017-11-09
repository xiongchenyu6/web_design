<?php
require_once(realpath(dirname(__FILE__) . "/src/render.php"));

$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
$renderLayoutWithContentFile("about-body.php");
?>
<link href="<?php echo $baseUrl ?>/public/css/about.css" rel="stylesheet"/>
