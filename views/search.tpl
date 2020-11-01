<html>
<head>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="/js/script.js"></script>

</head>
<body>

<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form class="form-inline my-2 my-lg-0" method="post" id="filterForm">
            <input name = "user" class="form-control mr-sm-2" type="text" placeholder="By User" aria-label="Search">
            <input name="title" class="form-control mr-sm-2" type="text" placeholder="By Task Title" aria-label="Search">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>
<script>
    var filterForm = document.getElementById('filterForm');
    filterForm.onsubmit = function(event) {
        event.preventDefault();
        var request = new XMLHttpRequest();
        request.open('POST', '/filterIdSearch', false);
        console.log('opne connexion ');
        var formData = new FormData(filterForm);
        request.send(formData);
        console.log('sending .. ');
        console.log(JSON.parse(request.responseText);
    }
</script>

<form id='test-form'>
    Input1: <input name='input1'><br>
    Input2: <input name='input2'><br>
    <input type='submit'>
</form>
<script>
    var testForm = document.getElementById('test-form');
    testForm.onsubmit = function(event) {
            event.preventDefault();
            var request = new XMLHttpRequest();
            request.open('POST', '/tasks/{}addComment', false);
            var formData = new FormData(document.getElementById('test-form'));
            alert(formData);
            request.send(formData);
        }
</script>
<ul id="listComments">
    <li> comment 1</li>
    <li> comment 2</li>
    <li> comment 3</li>
</ul>

<script>
    function byUser(str) {
        if (str.length==0) {
            document.getElementById("searchbyUser").innerHTML="";
            document.getElementById("searchbyUser").style.border="0px";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            var block = document.getElementById("searchbyUser") ;
            const data = JSON.parse(this.responseText);
            block.innerHTML = "" ;

            listContainer = document.createElement('div'),
                listElement = document.createElement('ul'),
                numberOfListItems = data.length ;

            // Add it to the page
            document.getElementById('searchbyUser').innerHTML ="" ;
            document.getElementById('searchbyUser').appendChild(listContainer);
            listContainer.appendChild(listElement);
            for (i = 0; i < numberOfListItems; ++i) {
                a = document.createElement('a');
                a.href = "/tasks/1/details" ;
                // Add the item text
                a.innerHTML = data[i].email;

                listElement.appendChild(a);
                listElement.appendChild(document.createElement('br'));
            }
        }
        xmlhttp.open("GET","/filterIdSearch?q="+str,true);
        xmlhttp.send();
    }
    function byTask(str) {
        if (str.length==0) {
            document.getElementById("searchbyTask").innerHTML="";
            document.getElementById("searchbyTask").style.border="0px";
            return;
        }
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            var block = document.getElementById("searchbyTask") ;
            const data = JSON.parse(this.responseText);
            block.innerHTML = "" ;

            listContainer = document.createElement('div'),
                listElement = document.createElement('ul'),
                numberOfListItems = data.length ;

            // Add it to the page
            document.getElementById('searchbyTask').innerHTML ="" ;
            document.getElementById('searchbyTask').appendChild(listContainer);
            listContainer.appendChild(listElement);

            if(numberOfListItems == 0)
            {
                p = document.createElement('p');
                p.textContent = "no sugg found";
                listElement.appendChild(p);

            }
            else
            {

                for (i = 0; i < numberOfListItems; ++i) {
                    a = document.createElement('a');
                    a.href = "/tasks/1/details" ;
                    // Add the item text
                    a.innerHTML = data[i].title;

                    listElement.appendChild(a);
                    listElement.appendChild(document.createElement('br'));
                }
            }
        }
        xmlhttp.open("GET","/filterTaskSearch?q="+str,true);
        xmlhttp.send();

</script>
</body>
</html>