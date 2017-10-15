let shopList = []

const calculate = () =>{
    let total = shopList.reduce((sum,el) => {
        let spanId = "sub" + el.id
        let subPrice = el.foodPrice * el.quantity
        document.getElementById(spanId).innerHTML = subPrice.toFixed(2)
        return sum + subPrice
    },0)
    console.log(total)
    document.getElementById("total").innerHTML = total.toFixed(2)
}
const addFood = (event,id,foodPrice) => {
    if(event.target.checked){
        shopList.push({id:id,foodPrice:foodPrice,quantity:0})
    }
    else{
        // shopList.forEach((element,index,category) => {
        //     if(element.id == id){
        //         category.splice(index,1)
        //     }
        // })
        shopList = shopList.filter((el) => el.id != id)
        document.getElementById("sub"+id).innerHTML = (0).toFixed(2)
    }
    calculate()

}

const changeAmount = (event,id) => {
    shopList.forEach((el) => {
        if(el.id == id){
            el.quantity = event.target.value
        }else{
            el
        }
    })
    calculate()

}

const buy = () => {
    var url = "menu.php";
    var params = JSON.stringify(shopList);
    var http = new XMLHttpRequest();
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/json");
    http.onreadystatechange = function() { //Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            alert("success")
            window.location.reload();
        }
    }
    http.send(params);
}
