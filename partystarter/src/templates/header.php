<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Party Starter</title>
    <link href="/../../public/css/layout.css" rel="stylesheet"/>
</head>

<body>
<div class="header">
    <img class="logo" src="/../../public/img/ps_logo.png"></img>
    <div class="nav">
        <div><a href="index.php">Home</a></div>
        <div><a href="parties.php">Parties</a></div>
        <div><a href="about.php">About</a></div>
        <div><a href="support.php">Support</a></div>

        <?php
        if (isset($_SESSION['photoUrl'])) {
            $photourl = $_SESSION['photoUrl'];
            $baseUrl = "index.php?logout=1";
            echo("<div><a href='management.php'><img class='profilePhoto' src='$photourl'></a><div><a href='$baseUrl'>Logout</a></div></div>");

        } else {
            echo("<div><a href=\"login.php\">Login</a></div>");
        }
        ?>

    </div>

</div>

<img class="cover" src="/../../public/img/caro22.jpeg"></img>
