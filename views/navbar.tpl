<html>
<head>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="50px" height="50px"/ >
    </a>
    {% if currentUser %}
    <h2 id="test"> Hey {{currentUser}} 🧐 </h2>
    {% endif %}

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <li>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">About</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="signOut">Sign out </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

</body>
<html/>
