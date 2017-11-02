function join(id) {
    if (confirm("Do you really want to join?" ) == true) {
        var http = new XMLHttpRequest();
        var url = "parties.php";
        var params = `id=${id}`;
        http.open("POST", url, true);

        //Send the proper header information along with the request
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function() { //Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                console.log(http.responseText);
            }
        }
        http.send(params);
    }
}