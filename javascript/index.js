let $ = require('jquery') ;
$( document ).ready(function() {
    function signOut()   {
        /* Login page scripts */
        var request = new XMLHttpRequest();
        request.open('GET', '/signOut', false);
        request.send();
        window.location.href ="/";
    }


    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $("#userFilterInput").onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('GET', '/filterIdSearch?user=' + hint, true);
        request.send();
        request.onreadystatechange = function () {
            data = JSON.parse(request.responseText);
            document.getElementById('listTasks').innerHTML = "";

            for (i = 0; i < data.length; ++i) {
                var a = document.createElement('a');
                a.href = "/tasks/" + data[i].id + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                a.textContent = data[i].title;
                document.getElementById('listTasks').append(a);

            }
        }
    }
    $("#taskFilterInput").onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('GET', '/filterTaskSearch?title=' + hint, true);
        request.send();
        request.onreadystatechange = function () {
            data = JSON.parse(request.responseText);
            document.getElementById('listTasks').innerHTML = "";
            console.log(data);
            for (i = 0; i < data.length; ++i) {
                var a = document.createElement('a');
                a.href = "/tasks/" + data[i].id + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                a.textContent = data[i].title;
                document.getElementById('listTasks').append(a);

            }
        }
    }

    var loginForm = document.getElementById('loginForm');
    loginForm.onsubmit = function(event) {
        var formData;
        var request;
        event.preventDefault();
        request = new XMLHttpRequest();
        formData = new FormData(loginForm)
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

        var testForm = document.getElementById('taskForm');
        testForm.onsubmit = function (event) {
            event.preventDefault();
            var request = new XMLHttpRequest();
            request.open('POST', '/tasks/addTask', false);
            var formData = new FormData(document.getElementById('taskForm'));
            request.send(formData);
            var a = document.createElement('a');
            const data  = JSON.parse(request.responseText);
            a.textContent = data['title'] ;
            a.href = "/tasks/" + data['id']+ "/details" ;
            a.classList.add("list-group-item", "list-group-item-action", "bg-light");
            document.getElementById('listTasks').appendChild(a);

        }

        var testForm = document.getElementById('commentForm');
        testForm.onsubmit = function (event) {
            event.preventDefault();
            var request = new XMLHttpRequest();
            request.open('POST', '/addComment', false);
            var formData = new FormData(document.getElementById('commentForm'));
            request.send(formData);


            li.textContent = JSON.parse(request.responseText);
            document.getElementById('listComments').appendChild(li);
            document.getElementById('commentInput').textContent= "" ;
        }
});
