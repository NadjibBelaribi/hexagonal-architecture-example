<html>
<head>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <a id="test" class="navbar-brand overflow-hidden" href="#">
        <img src="img/logo.png" width="30px" height="30px" />
        {% if currentUser %}
            Hey {{currentUser}} 🧐
        {% endif %}
    </a>
    <ul class="navbar-nav ml-auto important">
        <li class = "nav-item ml-auto">
            <a class="nav-linkkk" href="#" id="aboutUs" onclick="">About Us</a>
        </li>
        {% if currentUser %}
        <li class = "nav-item ml-auto">
            <a class="nav-linkkk" href="#" id="signOut" onclick="signOut()">Sign Out</a>
        </li>
        {% endif %}
    </ul>

</nav>

</body>
<html/>
