
<html>

<head>

    {% block head%}

    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Tasks </title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/index.js"></script>
    {% endblock %}
</head>

<body>
{% include 'navbar.tpl' %}
<div class="site-wrapper">

    <div class="site-wrapper-inner h-100">
        <div class="inner cover mt-5 mb-auto">
            <h1 class="cover-heading">A & N</h1>
            <h1 class="cover-heading">Todos  List </h1>
            <p class="lead"> A Simple Todo List Project  By Nadjib & Amir  </p>
            <p class="lead">
                <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Connexion </a>
            </p>
        </div>
        <div class="justify-content-center inner cover my-auto">
            <a href="https://git.unistra.fr/nbelaribi/todo-list" class="gitClass">
                <img class="logo" src="img/logogit.png"/>
            </a>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Welcome !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name = "email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name = "password" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
