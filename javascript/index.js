import 'bootstrap';
import {btoa} from "js-base64";
let $ = require('jquery');

$( document ).ready(function() {

    var loginForm = document.getElementById('loginForm');
    if(loginForm != null)
    {
        loginForm.onsubmit = function (event) {
            event.preventDefault();
            var formData;
            formData = new FormData(loginForm);
            var pwd = btoa(formData.get('password'));
            $.ajax({
                type: "post",
                url: '/auth',
                data:   {
                    "email": formData.get('email'),
                    "password": pwd,
                },
                success: function(data) {
                    data = JSON.parse(data) ;
                    document.getElementById('emailHelp').innerText = "";
                    if (data == "failure") {
                        document.getElementById('emailHelp').innerText = "Error identifiers , please try again !";
                    } else {
                        window.location.href = data;
                    }
                }
            });

        }
    }

    var signOut = document.getElementById('signOut') ;
    signOut.onclick = function (){
        $.ajax({
            type: "get",
            url: '/signOut',
            success: function(data) {
                 window.location.href = "/";
            }
        });
    }

    var userFilterInput = document.getElementById('userFilterInput') ;
    userFilterInput.onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        $.ajax({
            type: "get",
            url: '/filterIdSearch',
            data: {
                'user' : hint
            },
            success: function(data) {
                data = JSON.parse(data);
                var listTasks = document.getElementById('listTasks') ;
                listTasks.innerHTML = "";
                for (var i = 0; i < data.length; ++i) {
                    var a = document.createElement('a');
                    a.href = "/tasks/" + data[i].id + "/details";
                    a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                    a.textContent = data[i].title;
                    listTasks.append(a);
                }
            }
        });

    }
    var taskFilterInput = document.getElementById('taskFilterInput') ;
    taskFilterInput.onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        $.ajax({
            type: "get",
            url: '/filterTaskSearch',
            data: {
                'title' : hint
            },
            success: function(data) {
                data = JSON.parse(data);
                var listTasks = document.getElementById('listTasks') ;
                listTasks.innerHTML = "";
                for (var i = 0; i < data.length; ++i) {
                    var a = document.createElement('a');
                    a.href = "/tasks/" + data[i].id + "/details";
                    a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                    a.textContent = data[i].title;
                    listTasks.append(a);
                }
            }
        });

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
    var taskForm = document.getElementById('taskForm') ;
    taskForm.onsubmit = function (event) {
        event.preventDefault();
        var formData = new FormData(taskForm) ;

        $.ajax({
            type: "post",
            url: '/tasks/addTask',
            data: {
                'title': formData.get('title') ,
                'assigned': formData.get('assigned') ,
                'description': formData.get('description') ,
                'dueDate': formData.get('dueDate') ,

            },
            success: function(data) {
                 data = JSON.parse(data);
                var a = document.createElement('a');
                a.textContent = data['title'];
                a.href = "/tasks/" + data['id'] + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                var list = document.getElementById("listTasks");
                list.insertBefore(a, list.childNodes[0])
            }
        });

    }

    var commentForm = document.getElementById('commentForm');
    commentForm.onsubmit = function (event) {
        event.preventDefault();
          var formData = new FormData(commentForm);
         $.ajax({
            type: "post",
            url: '/addComment',
            data: {
                'comment': formData.get('comment')
            },
            success: function(data) {
                data = JSON.parse(data);
                document.getElementById('commentInput').innerText = "" ;
                var codeblock ='<div class="alert alert-primary" role="alert" style="border-radius: 30px ;">'+
                   ' <div class = "userClass important row">'+
                       ' <div class="col-lg-6"> <p class="userNameClass"> Me </p>'+
                        '</div>'+
                          '  <div class="col-lg-6">'+
                                '<p class="userDateClass">' + getCurDate()+'</p>'+
                             '</div>'+
                      ' </div>' +
                            '<p>' + data + '</p>\n' +
                    '</div>';
                document.getElementById('listComments').innerHTML += codeblock;            }
        });

    }

    $('.btnAddTask').on('click', function () {
        $('#listTasks').css('overflow','hidden');
    });

    $('.closeTask, .submitTask, .closeModal').on('click', function () {
        $('#listTasks').css('overflow','auto');
    });

});