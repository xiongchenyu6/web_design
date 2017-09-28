const validateForm = () => {
    event.preventDefault();
    'use strict'
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");
    if((email.value.length> 0) && (password.value.length> 0)){
        return true;
    } else {
        alert('Please complete the form!');
        return false;
    }
}

const init = () => {
    console.log("init");
    if(document && document.getElementById){
        let loginForm = document.querySelector("#loginForm");
        loginForm.onsubmit = validateForm;
    }
}

window.onload = init;
