import 'bootstrap';
let $ = require('jquery');

$(function () {

    document.getElementById("userFilterInput").onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('GET', '/filterIdSearch?user=' + hint, true);
        request.send();
        request.onreadystatechange = function () {
            var data = JSON.parse(request.responseText);
            document.getElementById('listTasks').innerHTML = "";

            for (var i = 0; i < data.length; ++i) {
                var a = document.createElement('a');
                a.href = "/tasks/" + data[i].id + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                a.textContent = data[i].title;
                document.getElementById('listTasks').append(a);

            }
        }
    }
    document.getElementById("taskFilterInput").onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('GET', '/filterTaskSearch?title=' + hint, true);
        request.send();
        request.onreadystatechange = function () {
            var data = JSON.parse(request.responseText);
            document.getElementById('listTasks').innerHTML = "";
            for (var i = 0; i < data.length; ++i) {
                var a = document.createElement('a');
                a.href = "/tasks/" + data[i].id + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                a.textContent = data[i].title;
                document.getElementById('listTasks').append(a);
            }
        }
    }

    var taskForm = document.getElementById('taskForm');
    taskForm.onsubmit = function (event) {
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('POST', '/tasks/addTask', false);
        var formData = new FormData(document.getElementById('taskForm'));
        request.send(formData);
        var a = document.createElement('a');
        const data = JSON.parse(request.responseText);
        a.textContent = data['title'];
        a.href = "/tasks/" + data['id'] + "/details";
        a.classList.add("list-group-item", "list-group-item-action", "bg-light");
        document.getElementById('listTasks').appendChild(a);

    }

    var commentForm = document.getElementById('commentForm');
    commentForm.onsubmit = function (event) {
        var codeBlock;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('POST', '/addComment', false);
        var formData = new FormData(document.getElementById('commentForm'));
        request.send(formData);

        const data = JSON.parse(request.responseText);
        document.getElementById('commentInput').textContent = "";
        var codeblock = '<div class="alert alert-primary" role="alert" style="border-radius: 30px ;">' +
            ' <div class = "userClass important">' +
            '<h5 class= "userNameClass"> Me </h5>' +
            '<h5 class= "userDateClass">' + new Date() + '</h5>' +
            '</div>' +
            '<p>' + data + '</p>\n' +
            '</div>';
        document.getElementById('listComments').innerHTML += codeblock;
    }

});
