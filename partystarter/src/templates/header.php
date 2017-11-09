<?php
$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Party Starter</title>
    <link href="<?php echo $baseUrl?>/public/css/layout.css" rel="stylesheet"/>
</head>

<body>
<div class="header">
    <img class="logo" src="<?php echo $baseUrl?>/public/img/ps_logo.png"></img>
    <div class="nav">
        <div><a href="<?php echo $baseUrl?>/index.php">Home</a></div>
        <div><a href="<?php echo $baseUrl?>/parties.php">Parties</a></div>
        <div><a href="<?php echo $baseUrl?>/about.php">About</a></div>
        <div><a href="<?php echo $baseUrl?>/support.php">Support</a></div>

        <?php
        if (isset($_SESSION['photoUrl'])) {
            $photourl = $_SESSION['photoUrl'];
            echo("<div><a href= '$baseUrl/management.php'><img class='profilePhoto' src='$baseUrl/$photourl'></a>
                  <div><a href='$baseUrl?logout=1'>Logout</a></div></div>");

        } else {
            echo("<div><a href='$baseUrl/login.php'>Login</a></div>");
        }
        ?>

    </div>

</div>
