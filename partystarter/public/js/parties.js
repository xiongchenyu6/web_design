function join(id) {

    if (confirm("do you really want to join?") == true) {
        var url = "parties.php";
        var params = `id=${id}`;
        const callback = (data) => {
            alert(data)
            window.location.reload()
        }
        makepost(url, params, callback);
    }
}

function makepost(url, params, callback) {

    var http = new XMLHttpRequest();
    http.open("post", url, true);
    //send the proper header information along with the request
    http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function () { //call a function when the state changes.
        if (http.readystate == 4 && http.status == 200) {
            callback(http.responsetext);
        }
    }
    http.send(params);
}
