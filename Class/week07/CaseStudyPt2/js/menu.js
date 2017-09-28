const calculate = () =>{
    let price = 0;
    const textinputs = document.querySelectorAll('input[type=checkbox]');
    const nonempty = [].map.call( textinputs, function( el ) {
        if(el.checked){
            price += parseFloat(el.value);
        }
        return el.checked
    });
    console.log(price);
}
