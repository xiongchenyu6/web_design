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
<?php if (isset($_POST['pay'])): ?>


<?php elseif(isset($_POST['cancel'])): ?>

<?php elseif(isset($_POST['close'])): ?>
    <?php
    echo "sdf";
    ?>

<?php else: ?>
    <?php
    $renderLayoutWithContentFile("management-body.php");
    ?>
    <link href="/public/css/management.css" rel="stylesheet"/>
    <script src="/public/js/management.js"></script>
<?php endif; ?>
