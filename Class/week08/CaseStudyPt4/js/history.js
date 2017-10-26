const show = (type) =>{
    let http = new XMLHttpRequest();
    let url = "history.php";
    let params = `type=${type}`;
    http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.onreadystatechange = function() { //Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            data = JSON.parse(http.responseText);
            console.log(data)
            let cols = [];
            data.map((el)=>{
                for(let key in el){
                    if(cols.indexOf(key) === -1){
                        cols.push(key)
                    }
                }
            })

            let table = document.createElement("table");

            let tr = table.insertRow(0);                   // TABLE ROW.

            cols.map((el)=>{
                let th = document.createElement("th");      // TABLE HEADER.
                th.innerHTML = el;
                tr.appendChild(th);
            })

            data.map((el)=>{
                tr = table.insertRow(-1);
                cols.map((col) => {
                    let tabCell = tr.insertCell(-1);
                    tabCell.innerHTML = el[col];
                })
            })

            let divContainer = document.getElementById("showData");
            divContainer.innerHTML = "";
            divContainer.appendChild(table);
        }
    }
    http.send(params);
}
