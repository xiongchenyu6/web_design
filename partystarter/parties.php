<?php
require_once(realpath(dirname(__FILE__) . "/src/render.php"));
require_once (MODULES_PATH.'/Host.php');
$host = new Host('host');
?>
<?php if (isset($_POST['id'])): ?>
    <?php
    require_once (MODULES_PATH."/Guest.php");
    $guest = new Guest('guest');
    $status = $guest->join($_SESSION['userId'],$_POST['id']);
    if($status == 0){
      echo ("You have join already");
    } else {
      echo ("Success");
    }
    ?>
<?php else: ?>
    <?php if(isset($_GET['search'])): ?>

    <?php endif; ?>
    <?php
    if(isset($parties)){
        $variables = array(
            'parties' => $parties
        );

    }
    else{
        $parties = $host->all();
        $variables = array(
            'parties' => $parties
        );
    }
    $renderLayoutWithContentFile("parties-body.php",$variables);
    ?>
    <link href="./public/css/parties.css" rel="stylesheet"/>
    <script src="./public/js/parties.js"></script>
<?php endif; ?>
