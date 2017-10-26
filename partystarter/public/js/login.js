function register() {
    prevent
    console.log("jump")
    window.location.href= "register.php"
}

document.getElementById('register').addEventListener('onclick',register)