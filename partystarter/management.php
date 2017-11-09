<?php
/**
 * Created by IntelliJ IDEA.
 * // * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/render.php"));
require_once(realpath(dirname(__FILE__) . "/src/auth.php"));
require_once(MODULES_PATH . '/Host.php');
require_once(MODULES_PATH . '/Guest.php');
?>

<?php if (isset($_POST['pay'])): ?>
    <?php
    if ($_POST['pay'] == 1) {
        $guest = new Guest('guest');
        $guest->payHost($_POST['id'], $_SESSION['userId']);
    }
    ?>

<?php elseif (isset($_POST['cancel'])): ?>
    <?php
    if ($_POST['cancel'] == 1) {
        $guest = new Guest('guest');
        $guest->leaveHost($_POST['id'], $_SESSION['userId']);
    }
    ?>
<?php elseif (isset($_POST['close'])): ?>
    <?php
    if ($_POST['close'] == 1) {
        print_r($_POST);
        $host = new Host('host');
        $host->closeHost($_POST['id']);
    }
    ?>

<?php else: ?>
    <?php
    $renderLayoutWithContentFile("management-body.php");
    ?>
    <link href="./public/css/management.css" rel="stylesheet"/>
    <script src="./public/js/management.js"></script>
<?php endif; ?>
