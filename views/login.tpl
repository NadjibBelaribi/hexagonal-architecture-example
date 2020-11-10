
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/hello.css">

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
                <form id="loginForm" method="post">
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

 <script>
     /* Login page scripts */
     var loginForm = document.getElementById('loginForm');
     loginForm.onsubmit = function(event) {
         event.preventDefault();
         var request = new XMLHttpRequest();
         var formData = new FormData(loginForm);
         request.open('POST', '/auth', false);
         request.send(formData);
         document.getElementById('emailHelp').innerText = "";
         const data = JSON.parse(request.responseText) ;
         if(data =="no")
         {
             document.getElementById('emailHelp').innerText = "Error identifiants";
         }
         else {
             window.location.href ="/tasks/"+data ;
         }
     }
 </script>

</body>
</html>
