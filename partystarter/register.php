<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/src/render.php"));
?>

<?php if (isset($_POST['submit'])): ?>

    <?php
    if (empty($_POST['username']) || empty ($_POST['password'])
        || empty ($_POST['password2']) || empty ($_POST['email'])
        || empty($_POST['self_description'])) {
        echo "All records to be filled in";
        exit;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password != $password2) {
        echo "Sorry passwords do not match";
        exit;
    }

    $email = $_POST['email'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        $target_file = $target_dir . basename("$username.$imageFileType");
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $self_description = $_POST['self_description'];
    $password = sha1($password);

    require_once(MODULES_PATH . "/User.php");
    $user = new User("user");
    $userId = $user->createUser($username, $password, $email, $target_file, $self_description);
    if ($userId == 0) {
        echo("Username is taken");
    } else {
        echo("Success");
        $_SESSION["photoUrl"] = $target_file;
        $_SESSION["userId"] = $userId;
    }
    ?>

<?php else: ?>
    <?php $renderLayoutWithContentFile("register-body.php"); ?>
    <script src="./public/js/login.js"></script>
    <link href="./public/css/register.css" rel="stylesheet"/>
<?php endif; ?>
