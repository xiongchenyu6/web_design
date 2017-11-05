
<br><br><div class="login" align="center">
<img src="/../../public/img/ps_img.jpeg" width="10%" height="10%" align="center"></img><br><br><br>
<h1> Sign Up Now </h1><br>
<form onsubmit="return ValidationEvent()" action="register.php" method="post" enctype="multipart/form-data">
<div>
    <label for="username">Name*:</label>
    <input required id="username" name="username"/> <br><br></div>
<div>
    <label for="password">Password*:</label>
    <input required id="password" type=="password" name="password"/><br><br></div>
<div>
    <label for="password2">Confirm Password*:</label>
    <input required id="password2" type=="password" name="password2"/><br><br></div>
<div>
    <label for="email">Email*:</label>
    <input required id="email" type="email" name="email"/>
<br><br></div>
<div>
    <label for="self_description">About Yourself*:</label>
    <input required id="self_description" type="text" name="self_description"/>
<br><br></div>
<div>
    <label for="fileToUpload">Profile Photo*:</label>
    <input required type="file" name="fileToUpload" id="fileToUpload"> <br><br></div>

    <label id="errorMessage" for="submit"></label>
    <input type="submit" value="Create Account" name="submit">

</form>

<br><br><br>
