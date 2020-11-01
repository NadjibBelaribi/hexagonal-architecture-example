/* Login page scripts */
var loginForm = document.getElementById('loginForm');
loginForm.onsubmit = function(event) {
    event.preventDefault();
    var request = new XMLHttpRequest();
    var formData = new FormData(loginForm);
    request.open('POST', '/auth', false);
    request.send(formData);
    document.getElementById('emailHelp').innerText = "";
    const data = JSON.parse(request.responseText) ;
    if(data =="no")
    {
        document.getElementById('emailHelp').innerText = "Error identifiants";
    }
    else {
        window.location.href ="/tasks/"+data ;
    }
}