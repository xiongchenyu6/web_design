<?php
/**
 * Created by IntelliJ IDEA.
 * // * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/render.php"));
require_once(realpath(dirname(__FILE__) . "/src/auth.php"));
?>

<?php if (isset($_POST['submit'])): ?>
    <?php
    require_once(MODULES_PATH . "/Host.php");
    $host = new Host('host');
    $result = $host->createHost($_POST);
    if($result){
       echo ("success");
    }
    else{
        echo ("fail");
    }
    ?>
<?php else: ?>
    <?php
    $renderLayoutWithContentFile("createnew-body.php");
    ?>
    <link href="/public/css/createNew.css" rel="stylesheet"/>
<?php endif; ?>
