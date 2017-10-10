const validate = () => {

    const now = new Date()
    const name = document.querySelector('#myName').value
    const email = document.querySelector('#myEmail').value
    const date = document.querySelector('#startDate').value

    const regxName = /^[a-z\s]+$/i
    const regxEmail = /^\S+@(\S+\.){0,3}\w{2,3}$/

    const nameValid = regxName.test(name);
    const emailValid = regxEmail.test(email);

    console.log("%cnew test", 'background: #222; color: #bada55')
    console.log("nameValid",nameValid);
    console.log("emailValid",emailValid);
    console.log("dateValid",(new Date(date)).getTime()<=now.getTime());
}