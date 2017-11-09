<?php
$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
?>
<br><br>
<div class="login" align="center">
    <img src="<?php echo $baseUrl ?>/public/img/ps_img.jpeg" width="10%" height="10%" align="center"></img><br><br><br>
    <h1> Login / Register </h1><br>

    <form action="login.php" method="post">
        <div>
            <label for="username">Name: </label>
            <input id="username" name="username"/><br><br></div>
        <div>
            <label for="password">Password: </label>
            <input id="password" type=="password" name="password"/><br><br></div>
        <div>
            <input id="submit" type="submit" value="  Login  " name="submit"></div>

    </form>

    <div>

        <button id="register">Register</button>
    </div>
    <br><br><br><br></div>
