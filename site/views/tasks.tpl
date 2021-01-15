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
    <link rel="stylesheet" href="css/todos.css?">
     <script src="js/index.js"></script>
    {% endblock %}
</head>

<body style="background-image: url(img/bg.jpg)">
{% include 'navbar.tpl' %}

<div class="d-flex row" id="wrapper">

    <!-- Sidebar -->
    <div class="col-md-3" id="sidebar-wrapper">
        <button class="btnPannel important btn btn-outline-primary mx-auto" type="button" data-toggle="collapse"
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
        <button type="button" style="justify-content: center" class="btnAddTask important btn btn-outline-primary"
                data-toggle="modal" data-target="#exampleModalCenter">
            Add New Task </button>
        <hr>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content toto">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">
                            Add new Task
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="taskForm">

                            <div class="form-group">
                                <label for="inputAddress">Title</label>
                                <input name="title" type="text" class="form-control" id="inputAddress"
                                       placeholder="" required />
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Description</label>
                                <input name="description" type="text" class="form-control" id="inputAddress2"
                                       placeholder="" / required>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6" >
                                    <label for="inputAssign">Assign to : </label>
                                    <select name="assigned" id="inputAssign" class="form-control" required>
                                        <option value="empty"> </option>
                                        {% for user in users %}
                                        <option value={{ user.email }}>{{ user.email }}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDate">Due Date</label>
                                    <input name="dueDate" type="date" class="form-control" id="inputDate" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="closeTask btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" id = "submit-task" class="submitTask  btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div id="listTasks" class="list-group list-group-flush">
            {% for task in todos %}
              <a href="/tasks/{{task.id}}/details" class="list-group-item important list-group-item-action"
               onclick="this.classList.add('active');">{{ task.title }} </a>
            {% endfor %}

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container-fluid col-md-9" id="page-content-wrapper">
        <div class="h-100 p-3">
            <div class="row h-100">
                <div class="respoTaskDetails col-md-6 h-100">
                    <div class="card h-100" id="taskDetails">
                        <div class="card-header important">
                            Title : {{ curTask['title']}}
                        </div>
                        <div class="card-body">
                            <p class="card-title">Description : </p>
                            <p id="descriptionTask" class="card-text bg-primary rounded px-3 py-1">{{ curTask['description']}}</p>
                        </div>

                        <ul class="mr-2">
                            <li class="card-text bg-primary rounded my-3 px-3 py-1">Created By : {{ creator }} </li>
                            <li class="card-text bg-primary rounded my-3 px-3 py-1">Created at : {{ curTask['created_at']}} </li>
                            <li class="card-text bg-primary rounded my-3 px-3 py-1">Assign To : {{ assigned }} </li>
                            <li class="card-text bg-primary rounded my-3 px-3 py-1">Due Date : {{ curTask['due_date']}}</li>
                        </ul>
                    </div>
                </div>
                <div class="respoTaskComments col-md-6 h-100">
                    <div class="card h-100" id="taskComments">
                        <div class="card-header important">Comments</div>
                        <ul id="listComments">
                            {% for comment in comments %}

                            <div class="alert alert-primary" role="alert" style="border-radius: 30px ;">
                                <div class="userClass important row">
                                    <div class="col-lg-6">
                                        <p class="userNameClass"> {{ comment.email }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="userDateClass"> {{ comment.created_at }}</p>
                                    </div>
                                </div>
                                <p> {{ comment.comment }}</p>
                            </div>
                            {% endfor %}

                        </ul>
                        <form id="commentForm">
                            <div class="input-group mb-3">
                                <input id="commentInput" name="comment" type="text" class="form-control"
                                       placeholder="Add a comment" value="" aria-label="Recipient's username"
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