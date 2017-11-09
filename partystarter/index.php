<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/render.php"));
$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
?>

<?php if (isset($_GET['logout'])): ?>
    <?php
    session_destroy();
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
    ?>
<?php endif; ?>

<?php
$renderLayoutWithContentFile("index-body.php");
?>

<link href="<?php echo $baseUrl ?>/public/css/index.css" rel="stylesheet"/>
<script src="<?php echo $baseUrl ?>/public/js/login.js"></script>