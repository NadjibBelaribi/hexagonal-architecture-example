import 'bootstrap';
import {btoa} from "js-base64";
let $ = require('jquery');

$( document ).ready(function() {


    /********** Login AJAX SCRIPT ***************/
    var loginForm = document.getElementById('loginForm');
    if(loginForm != null)
    {
        loginForm.onsubmit = function (event) {
            event.preventDefault();
            var formData;
            formData = new FormData(loginForm);
            $.ajax({
                type: "post",
                url: '/auth',
                data:   {
                    "email": formData.get('email'),
                    "password":formData.get('password'),
                },
                success: function(data) {
                    data = JSON.parse(data) ;
                    alert(data) ;
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
    /********** SIGN OUT AJAX SCRIPT ***************/

    var signOut = document.getElementById('signOut') ;
    if(signOut != null)
    {
        signOut.onclick = function (){
            $.ajax({
                type: "get",
                url: '/signOut',
                success: function() {
                    window.location.href = "/";
                }
            });
        }
    }

    /********** Filter tasks by User Name AJAX SCRIPT ***************/

    var userFilterInput = document.getElementById('userFilterInput') ;
    if(userFilterInput != null)
    {
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
    }

    /********** Filter tasks by Tasks Title AJAX SCRIPT ***************/

    var taskFilterInput = document.getElementById('taskFilterInput') ;
    if(taskFilterInput != null)
    {
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
                    data = JSON.parse(data) ;
                    alert("here are results " + data) ;
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
    }

    /********** Self function that returns date in format dd-mm-yyyy hh;mm;ss ***************/

    function getCurDate()
    {
        var d = new Date() ;
        d = new Date(d.getTime() - 3000000);
        var timeStampsFormat = d.getFullYear().toString()+"-"+((d.getMonth()+1).toString().length == 2?(d.getMonth()+1).toString():"0"+(d.getMonth()+1).toString())+"-"+
            (d.getDate().toString().length==2?d.getDate().toString():"0"+d.getDate().toString())+
            " "+(d.getHours().toString().length==2?d.getHours().toString():"0"+d.getHours().toString())+
            ":"+((parseInt(d.getMinutes()/5)*5).toString().length==2?(parseInt(d.getMinutes()/5)*5).toString():
                "0"+(parseInt(d.getMinutes()/5)*5).toString())+":00";

        return timeStampsFormat ;
    }
    /********** Add New Task  AJAX SCRIPT ***************/

    var taskForm = document.getElementById('taskForm') ;
    if(taskForm != null)
    {
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
                   // console.log(data[0] + " " data[1]) ;
                    var a = document.createElement('a');
                    a.textContent = data[1];
                    a.href = "/tasks/" + data[0] + "/details";
                    a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                    var list = document.getElementById("listTasks");
                    list.insertBefore(a, list.childNodes[0])
                }
            });

        }
    }

    /********** Add New Comment AJAX SCRIPT ***************/

    var commentForm = document.getElementById('commentForm');
    if(commentForm != null)
    {
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
                      document.getElementById('commentInput').innerText = "" ;
                    var codeblock ='<div class="alert alert-primary" role="alert" style="border-radius: 30px ;">'+
                        ' <div class = "userClass important row">'+
                        ' <div class="col-lg-6"> <p class="userNameClass"> Me </p>'+
                        '</div>'+
                        '  <div class="col-lg-6">'+
                        '<p class="userDateClass">' + getCurDate()+'</p>'+
                        '</div>'+
                        ' </div>' +
                        '<p>' + JSON.parse(data) + '</p>\n' +
                        '</div>';
                    document.getElementById('listComments').innerHTML += codeblock;            }
            });

        }
    }


    $('.btnAddTask').on('click', function () {
        $('#listTasks').css('overflow','hidden');
    });

    $('.closeTask, .submitTask, .closeModal').on('click', function () {
        $('#listTasks').css('overflow','auto');
    });

});