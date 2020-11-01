<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tasks </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../public/comments.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>
{% include 'navbar.tpl' %}
<div class="d-flex container-fluid" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
        <br />
        <button type="button" style="justify-content: center" class="btn btn-outline-primary"" data-toggle="modal"
                data-target="#exampleModalCenter">
            Add New Task </button>

        <br /> <br />

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Add new Task
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="taskForm">

                            <div class="form-group">
                                <label for="inputAddress">Title</label>
                                <input name="title" type="text" class="form-control" id="inputAddress"
                                       placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Description</label>
                                <input name="description" type="text" class="form-control" id="inputAddress2"
                                       placeholder="" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAssign">Assign to : </label>
                                <select name="assigned" id="inputAssign" class="form-control">
                                    <option value="empty"> </option>
                                    {% for user in users %}
                                    <option value={{user.email}}>{{user.email}}</option>
                                    {% endfor %}
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDate">Due Date</label>
                                <input name="dueDate" type="date" class="form-control" id="inputDate" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <script>
                            var testForm = document.getElementById('taskForm');
                            testForm.onsubmit = function (event) {
                                event.preventDefault();
                                var request = new XMLHttpRequest();
                                request.open('POST', '/tasks/addTask', false);
                                var formData = new FormData(document.getElementById('taskForm'));
                                request.send(formData);
                                testForm.reset();
                                var a = document.createElement('a');
                                a.textContent = JSON.parse(request.responseText);
                                a.href = "/tasks/3/details"
                                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                                document.getElementById('listTasks').appendChild(a);

                            }
                        </script>
                    </div>

                </div>
            </div>
        </div>

        <div id="listTasks" class="list-group list-group-flush overflow-auto">
            {% for task in todos %}
            <a href="/tasks/{{task.id}}/details" class="list-group-item list-group-item-action" onclick="this.classList.add('active');">{{task.title}}</a>
            {% endfor %}
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container-fluid" id="page-content-wrapper">
        <br />
        <div class="container-fluid">
            <div class="card" id="taskDetails">
                <div class="card-header">
                    Title : {{curTask['title']}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Description : </h5>
                    <p class="card-text">{{curTask['description']}}</p>
                </div>

                <ul>
                    <li>Created By : {{creator}} </li>
                    <li>Created at : {{curTask['created_at']}} </li>
                    <li>Assign To : {{assigned}} </li>
                    <li>Due Date : {{curTask['due_date']}}</li>
                </ul>
            </div>
            <br />
            <div class="card" id="taskComments">
                <div class="card-header">
                    Comments
                </div>
                <ul id="listComments">
                    {% for comment in comments %}
                    <li> {{comment.comment}} </li>
                    {% endfor %}
                </ul>
                <form id="commentForm">
                    <div class="input-group mb-3">
                        <input id="commentInput" name="comment" type="text" class="form-control"
                               placeholder="Add a comment" aria-label="Recipient's username"
                               aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary mb-2" id="addComment">Send</button>
                        </div>
                    </div>
                </form>
                <script>
                    var testForm = document.getElementById('commentForm');
                    testForm.onsubmit = function (event) {
                        var request = new XMLHttpRequest();
                        request.open('POST', '/addComment', false);
                        var formData = new FormData(document.getElementById('commentForm'));
                        request.send(formData);
                        var li = document.createElement('li');
                        li.textContent = JSON.parse(request.responseText);
                        document.getElementById('listComments').appendChild(li);
                        testForm.reset();
                    }
                </script>


            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>


    <!-- Bootstrap core JavaScript -->

    <!-- Menu Toggle Script -->
    <script>

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>