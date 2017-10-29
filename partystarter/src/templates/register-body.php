<form action="register.php" method="post" enctype="multipart/form-data">

    <label for="username">Name</label>
    <input required id="username" name="username"/>

    <label for="password">Password</label>
    <input required id="password" type=="password" name="password"/>

    <label for="password2">Password One More Time</label>
    <input required id="password2" type=="password" name="password2"/>

    <label for="email">Email</label>
    <input required id="email" type="email" name="email"/>


    <label for="self_description">Self Description</label>
    <input required id="self_description" type="text" name="self_description"/>

    <label for="fileTpUpload">ImagePhoto</label>
    <input required type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Create" name="submit">

</form>