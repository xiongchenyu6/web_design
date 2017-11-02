var page = "p";
var profilePage = document.getElementsByClassName('main');
var hostPage = document.getElementsByClassName('host');
var guestPage = document.getElementsByClassName('join');

var profileButton = document.getElementById('profileB');
var hostButton = document.getElementById('hostB');
var guestButton = document.getElementById('joinB');

function showProfile() {
    if(page == "h"){
        toggle(hostPage);
    }else if(page == "g"){
        toggle(guestPage)
    }else {
        return
    }
    toggle(profilePage)
    page = "p";
}
function showHost() {
    if(page == "p"){
        toggle(profilePage)
    }else if(page == "g"){
        toggle(guestPage)
    }else {
        return
    }
    toggle(hostPage)
    page = "h";
}
function showGuess() {
    if(page == "p"){
        toggle(profilePage)
    }else if(page == "h"){
        toggle(hostPage)
    }else {return}
    toggle(guestPage)
    page = "g";
}

function toggle(el) {
    if(el[0].style.display == 'none'){
       el[0].style.display = 'block';
    } else {
        el[0].style.display = 'none';
    }

}

profileButton.addEventListener('click',showProfile);
hostButton.addEventListener('click',showHost);
guestButton.addEventListener('click',showGuess);