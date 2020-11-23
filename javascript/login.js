import 'bootstrap';
import {atob, btoa} from "js-base64";
let $ = require('jquery');
$(function () {

    function signOut() {
        var request = new XMLHttpRequest();
        request.open('GET', '/signOut', false);
        request.send();
        window.location.href = "/";
    }

    var loginForm = document.getElementById('loginForm');
    loginForm.onsubmit = function (event) {
        var formData;
        var request;
        event.preventDefault();
        request = new XMLHttpRequest();
        formData = new FormData(loginForm);
        var pwd = formData.get('password') ;
        formData.set('password',btoa(formData.get('password'))) ;
        request.open('POST', '/auth', false);
        request.send(formData);
        document.getElementById('emailHelp').innerText = "";
        const data = JSON.parse(request.responseText);
        if (data == "failure") {
            document.getElementById('emailHelp').innerText = "Error identifiers";
        } else {
            window.location.href = "/tasks/" + data;
        }
    }
});