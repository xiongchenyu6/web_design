<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/render.php")); ?>

<?php if (isset($_POST['submit'])): ?>
    <?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($_SESSION['photoUrl'])) {
        echo("You have logged in.");
    } else {
        require_once(MODULES_PATH . "/User.php");
        $user = new User("user");
        $auth = $user->checkUser($username, $password);
        if ($auth) {
            $_SESSION['photoUrl'] = $auth["profile_photo"];
            $_SESSION["userId"] = $auth["id"];
            echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';

        } else {
            echo("Wrong username or password");
        }
    }
    ?>
<?php else: ?>
    <?php $renderLayoutWithContentFile("login-body.php"); ?>
    <link href="./public/css/login.css" rel="stylesheet"/>
    <script src="./public/js/login.js"></script>
<?php endif; ?>
