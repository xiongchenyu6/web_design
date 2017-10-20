<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/config.php"));
require_once(TEMPLATES_PATH . "/header.php");
require_once(TEMPLATES_PATH . "/index-body.php");
require_once(TEMPLATES_PATH . "/footer.php");
require_once(MODULES_PATH . "/User.php");
$user = new User('user');
print_r($user->byId(1));
?>


<?php
// close container div
//echo "</div>\n";
//echo "</div>\n";
require_once(TEMPLATES_PATH . "/footer.php");
ererewrwe
?>
