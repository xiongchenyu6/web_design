updatePrice = (id) => {
    let price = prompt("please input the new price") * 100
    var http = new XMLHttpRequest();
    var url = "priceUpdate.php";
    var params = `id=${id}&price=${price}`;
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() { //Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            window.location.reload();
            console.log(http.responseText);
        }
    }
    http.send(params);
}
