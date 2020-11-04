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
                    <a class="dropdown-item" id="signOut" onclick="signOut()">Sign out </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('userFilterInput').onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('GET', '/filterIdSearch?user=' + hint, true);
        request.send();
        request.onreadystatechange = function () {
            data = JSON.parse(request.responseText);
            document.getElementById('listTasks').innerHTML = "";

            for (i = 0; i < data.length; ++i) {
                var a = document.createElement('a');
                a.href = "/tasks/" + data[i].id + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                a.textContent = data[i].title;
                document.getElementById('listTasks').append(a);

            }
        }
    }
    document.getElementById('taskFilterInput').onkeyup = function (event) {
        const hint = this.value;
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('GET', '/filterTaskSearch?title=' + hint, true);
        request.send();
        request.onreadystatechange = function () {
            data = JSON.parse(request.responseText);
            document.getElementById('listTasks').innerHTML = "";
            console.log(data);
            for (i = 0; i < data.length; ++i) {
                var a = document.createElement('a');
                a.href = "/tasks/" + data[i].id + "/details";
                a.classList.add("list-group-item", "list-group-item-action", "bg-light");
                a.textContent = data[i].title;
                document.getElementById('listTasks').append(a);

            }
        }
    }

    function signOut()   {
        /* Login page scripts */
            var request = new XMLHttpRequest();
            request.open('GET', '/signOut', false);
            request.send();
            window.location.href ="/";
    }

</script>
</body>
<html/>
