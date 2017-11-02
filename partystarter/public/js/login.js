function register() {
    console.log("jump")
    window.location.href = "register.php"
}

var registerDom =  document.getElementById('register');
registerDom? registerDom.addEventListener('click', register) : null ;
