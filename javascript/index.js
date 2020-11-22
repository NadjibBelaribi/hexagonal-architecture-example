import 'bootstrap';
let $ = require('jquery');

$( document ).ready(function() {

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
    function getCurDate()
    {
        var d = new Date() ;
        d = new Date(d.getTime() - 3000000);
        var date_format_str = d.getFullYear().toString()+"-"+((d.getMonth()+1).toString().length == 2?(d.getMonth()+1).toString():"0"+(d.getMonth()+1).toString())+"-"+
            (d.getDate().toString().length==2?d.getDate().toString():"0"+d.getDate().toString())+
            " "+(d.getHours().toString().length==2?d.getHours().toString():"0"+d.getHours().toString())+
            ":"+((parseInt(d.getMinutes()/5)*5).toString().length==2?(parseInt(d.getMinutes()/5)*5).toString():
                "0"+(parseInt(d.getMinutes()/5)*5).toString())+":00";

        return date_format_str ;
    }
    var taskForm = document.getElementById('taskForm');
    taskForm.onsubmit = function (event) {
        event.preventDefault();
        var request = new XMLHttpRequest();
        var formData = new FormData(document.getElementById('taskForm'));
        request.open('POST', '/tasks/addTask', false);
        request.send(formData);
        var a = document.createElement('a');
        const data = JSON.parse(request.responseText);
        a.textContent = data['title'];
        a.href = "/tasks/" + data['id'] + "/details";
        a.classList.add("list-group-item", "list-group-item-action", "bg-light");
        var list = document.getElementById("listTasks");
        list.insertBefore(a, list.childNodes[0]);

    }

    var commentForm = document.getElementById('commentForm');
    commentForm.onsubmit = function (event) {
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
            '<h5 class= "userDateClass">' + getCurDate() + '</h5>' +
            '</div>' +
            '<p>' + data + '</p>\n' +
            '</div>';
        document.getElementById('listComments').innerHTML += codeblock;
    }

    $('.btnAddTask').on('click', function () {
        $('#listTasks').css('overflow','hidden');
    });

    $('.closeTask, .submitTask, .closeModal').on('click', function () {
        $('#listTasks').css('overflow','auto');
    });

});