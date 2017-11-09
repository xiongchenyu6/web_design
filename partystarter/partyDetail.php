<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/render.php"));
require_once(realpath(dirname(__FILE__) . "/src/auth.php"));
require_once(MODULES_PATH . '/Guest.php');
$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
$guest = new Guest('guest');
?>
<?php if (isset($_POST['user_id'])): ?>
    <?php
    extract($_POST);
    echo $guest->setCommentAndRate($user_id, $host_id, $comment, $rate);

    ?>
<?php else: ?>
    <?php if (isset($_GET['id'])): ?>
        <?php

        require_once(MODULES_PATH . '/Host.php');
        require_once(MODULES_PATH . '/User.php');
        $host = new Host('host');
        $user = new User('user');
		        $thisHost = $host->byId($_GET['id']);
        $hostInfo = $user->byId($thisHost['user_id']);
        $guestList = $guest->findGuestListByHostId($_GET['id']);


        if ($thisHost['user_id'] == $_SESSION['userId']) {
            $variables = array(
                'host' => $thisHost,
                'type' => "owner",
                'hostInfo' => $hostInfo,
                'guestList' => $guestList,
            );

            $renderLayoutWithContentFile("parties-body.php", $variables);
        } else {
            $variables = array(
                'host' => $thisHost,
                'hostInfo' => $hostInfo,
                'guestList' => $guestList,
                'type' => "guest"
            );
            $renderLayoutWithContentFile("partyDetail-body.php", $variables);
        }
        ?>
        <link href="<?php echo $baseUrl ?>/public/css/partiesDetail.css" rel="stylesheet"/>
        <script src="<?php echo $baseUrl ?>/public/js/partyDetail.js"></script>
    <?php else: ?>
        <?php
        echo("wrong Url");
        ?>
    <?php endif; ?>
<?php endif; ?>
