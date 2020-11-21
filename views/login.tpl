
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
    <script src="js/login.js"></script>
    {% endblock %}
</head>

<body style="background-image: url('img/bg.jpg');background-repeat: no-repeat;background-size: cover;">
{% include 'navbar.tpl' %}
<div class="site-wrapper">

    <div class="site-wrapper-inner">
        <div class="container-fluid">
            <div class="inner cover">
                <h1 class="cover-heading">A & N <br> Todos  List </h1>
                <p class="lead"> A Master Project By Nadjib and Amir Under M. Hakan  Supervision </p>
                <p class="lead">
                    <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Connexion </a>
                </p>
            </div>
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
                        <input name = "email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name = "password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </body>
</html>
