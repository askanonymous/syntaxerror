const form = [...document.querySelector('.form').children];

form.forEach((item, i) => {
    setTimeout(() => {
        item.style.opacity = 1;
    }, i*100);
})


function auth(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if(email == "admin@gmail.com" && password == "admin@12345"){
        window.location.assign("../dashboard.html");
    }
    else{
        alert("Invalid Details!");
        return;
    }
}

const alertBox = (data) => {
    const alertContainer = document.querySelector('.alert-box');
    const alertMsg = document.querySelector('.alert');
    alertMsg.innerHTML = data;

    alertContainer.style.top = '5%';
    setTimeout(() => {
        alertContainer.style.top = null;
    }, 5000);

}