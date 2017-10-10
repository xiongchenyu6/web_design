const calculate = () =>{
    let price = 0;
    a =[]
    a.push(document.querySelector('#f').value)
    a.push(document.querySelector('#s').value)
    a.push(document.querySelector('#d').value)
    const textinputs = document.querySelectorAll('input[type=checkbox]');
    const nonempty = [].forEach.call( textinputs, ( el, i ) => {
        if(el.checked){
            console.log(parseFloat(el.value) * parseInt(a[i]));
            price += parseFloat(el.value) * parseInt(a[i]);
        }
        return el.checked
    });
    console.log("total");
    console.log(price);
}
