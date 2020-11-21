<!DOCTYPE html>
<html lang="fr">

<head>

    {% block head%}

    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tasks </title>
    <link rel="stylesheet" href="css/todos.css">
     <script src="js/index.js"></script>
    {% endblock %}
</head>

<body style="background-image: url(img/bg.jpg)">
{% include 'navbar.tpl' %}

<div class="d-flex row" id="wrapper">

    <!-- Sidebar -->
    <div class="col-sm-2" id="sidebar-wrapper">
        <button class="btnPannel btn btn-outline-primary mx-auto" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Filter Pannel
        </button>

        <div class="collapse" id="collapseExample">
            <form class="form-inline my-2 my-lg-0" method="post" id="filterForm">
                <input id="userFilterInput" name="user" class="form-control mr-sm-2" placeholder="By User"
                       aria-label="Search">
                <input id="taskFilterInput" name="title" class="form-control mr-sm-2"
                       placeholder="By Task Title" aria-label="Search">
            </form>
        </div>
        <hr>
        <button type="button" style="justify-content: center" class="btnAddTask btn btn-outline-primary"
                data-toggle="modal" data-target="#exampleModalCenter">
            Add New Task </button>
        <hr>


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
                                    <option value={{ user.email }}>{{ user.email }}</option>
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
                    </div>

                </div>
            </div>
        </div>

        <div id="listTasks" class="list-group list-group-flush overflow-auto" style="
            display: block;
            overflow-y: scroll;
            height: 650px;
            text-align: center;
            scroll-behavior: smooth;">
            {% for task in todos %}
            <a href="/tasks/{{task.id}}/details" class="list-group-item list-group-item-action"
               onclick="this.classList.add('active');">{{ task.title }} </a>
            {% endfor %}

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container-fluid col-sm-10" id="page-content-wrapper">
        <div class="h-100 p-3">
            <div class="row h-100">
                <div class="respoTaskDetails col-md-6 h-50">
                    <div class="card h-100" id="taskDetails">
                        <div class="card-header important">
                            Title : Titre de tache
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Description : </h5>
                            <p class="card-text">{{ curTask['description']}}</p>
                        </div>

                        <ul>
                            <li>Created By : {{ creator }} </li>
                            <li>Created at : {{ curTask['created_at']}} </li>
                            <li>Assign To : {{ assigned }} </li>
                            <li>Due Date : {{ curTask['due_date']}}</li>
                        </ul>
                    </div>
                </div>
                <div class="respoTaskComments col-md-6 h-100">
                    <div class="card h-100" id="taskComments">
                        <div class="card-header important">Comments</div>
                        <ul id="listComments">
                            {% for comment in comments %}

                            <div class="alert alert-primary" role="alert" style="border-radius: 30px ;">
                                <div class="userClass important">
                                    <h5 class="userNameClass"> {{ comment.email }}</h5>
                                    <h5 class="userDateClass"> {{ comment.created_at }}</h5>
                                </div>
                                <p> {{ comment.comment }}</p>
                            </div>
                            {% endfor %}

                        </ul>
                        <form id="commentForm">
                            <div class="input-group mb-3">
                                <input id="commentInput" name="comment" type="text" class="form-control"
                                       placeholder="Add a comment" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary mb-2"
                                            id="addComment">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</body>

</html>