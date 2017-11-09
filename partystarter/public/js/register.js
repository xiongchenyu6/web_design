function validate() {
    const name = document.querySelector('#username').value
    const email = document.querySelector('#email').value
    const errorMessage = document.querySelector('#errorMessage')
    const regxName = /^[a-z\s]+$/i
    const regxEmail = /^\S+@(\S+\.){0,3}\w{2,3}$/

    const nameValid = regxName.test(name);
    const emailValid = regxEmail.test(email);

    if (!nameValid) {
        errorMessage.innerHTML = "Username should only contain letter";
        return false;
    } else if (!emailValid) {
        errorMessage.innerHTML = "Email is not valid";
        return false;
    } else {
        console.info("success");
        errorMessage.innerHTML = "";
        return true;
    }

}
