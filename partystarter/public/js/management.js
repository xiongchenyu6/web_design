var page = "p";
var profilePage = document.getElementsByClassName('main');
var hostPage = document.getElementsByClassName('host');
var guestPage = document.getElementsByClassName('join');

var profileButton = document.getElementById('profileB');
var hostButton = document.getElementById('hostB');
var guestButton = document.getElementById('joinB');
var closedButton =  document.getElementById('closeB');

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

function closeParty(host_id) {

    if (confirm("do you really want to close the party?" ) == true) {
        var url = "/management.php";
        var params = `close=1&id=${host_id}`;
        const callback = (data) =>{
            alert(data)
        }
        makePost(url,params,callback);
    }
}

function makePost(url,params,callback) {

    var http = new XMLHttpRequest();
    http.open("post", url, true);
    //send the proper header information along with the request
    http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() { //call a function when the state changes.
        if(http.readystate == 4 && http.status == 200) {
            callback(http.responsetext);
        }
    }
    http.send(params);
}
