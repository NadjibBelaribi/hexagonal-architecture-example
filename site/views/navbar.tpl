<html>
<head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <a id="test" class="navbar-brand overflow-hidden">
    </a>
    <a class="navbar-brand overflow-hidden important" style="color: silver">
        <img src="img/logo.png" width="50px" height="50px" />
        {% if currentUser %}
        Hey {{currentUser}}
        {% endif %}
    </a>

    <ul class="navbar-nav ml-auto important">
        <li class = "nav-item ml-auto">
            <a class="nav-linkkk" href="/about" id="aboutUs" >About Us</a>
        </li>
        {% if currentUser %}
        <li class = "nav-item ml-auto">
            <a class="nav-linkkk" id="signOut">Sign Out</a>
        </li>
        {% endif %}
    </ul>

</nav>

</body>
<html/>
