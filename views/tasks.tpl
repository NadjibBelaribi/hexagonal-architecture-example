<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

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


</head>

<body>

<div class="d-flex container-fluid" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <br/>
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Filter Pannel
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="By User" aria-label="Search">
                </form>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="By Task Title" aria-label="Search">
                </form>
            </div>
        </div>
        <button type="button" style="justify-content: center" class="btn btn-primary" data-toggle="modal"
                              data-target="#exampleModalCenter">
                Add New Task </button>

        <br /> <br/>

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
                        <form method="post">

                            <div class="form-group">
                                <label for="inputAddress">Title</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Description</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputAssign">Assign to : </label>
                                <select id="inputAssign" class="form-control">
                                    <option value="empty"> </option>
                                    {% for user in users %}
                                    <option value={{user.email}}>{{user.email}}</option>
                                    {% endfor %}
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDate">Due Date</label>
                                <input type="date" class="form-control" id="inputDate" />
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

        <div class="list-group list-group-flush">
            {% for task in todos %}
            <a href="/tasks/{{task.id}}/details" class="list-group-item list-group-item-action bg-light">{{task.title}}</a>
            {% endfor %}
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container-fluid" id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                    <li>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                             aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">About</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Sign out </a>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br/>
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
                     <li>Created By : {{curTask['created_by']}} </li>
                     <li>Created at  : {{curTask['created_at']}} </li>
                     <li>Assign To  : {{curTask['assigned_to']}} </li>
                     <li>Due Date  : {{curTask['due_date']}}</li>
                 </ul>
            </div>
            <br/>
            <div class="card" id="taskComments">
                <div class="card-header">
                    Comments
                </div>
                <ul>
                    {% for comment in comments %}
                         <li> {{comment.comment}} </li>
                     {% endfor %}
                </ul>


            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>