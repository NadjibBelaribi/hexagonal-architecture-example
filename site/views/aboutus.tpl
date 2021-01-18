<!DOCTYPE html>
<html lang="fr">

<head>

    {% block head%}

    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>About us </title>
    <link rel="stylesheet" href="css/aboutus.css">
    {% endblock %}
</head>

<body style="background-image: url(img/bg.jpg)">
{% include 'navbar.tpl' %}
<section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">Réalisateurs </h5>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="image-flip" >
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="img/amir.png" alt="card image amir"></p>
                                        <h4 class="card-title">Amir</h4>
                                        <p class="card-text">Charged of the Front-End
                                        <br>
                                        Pass your mouse to know more about me !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Amir</h4>
                                        <p class="card-text">Hello ! I'm Amir and I'm in Master 1 of CMI IMAGE in Strasbourg.
                                        For this project, I'm charged of the front-end and some controllers in PHP. I search a stage in relation with the medical domain.
                                        <br>
                                        Click on my linkedin link to know more about me !
                                        </p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="https://fr.linkedin.com/in/amir-bouafia">
                                                    <i class="fa fa-linkedin"></i>                                                
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="img/nadjib.png" alt="card image nadjib"></p>
                                        <h4 class="card-title">Nadjib</h4>
                                        <p class="card-text">Charged of the Back-End.
                                        <br>
                                        Pass your mouse to know more about me !
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Nadjib</h4>
                                        <p class="card-text">Hello ! I'm Nadjib and I'm in Master 1 SIL in Strasbourg.
                                        For this project, I took charged  of the back-end of the site and the JS features.
                                        <br>
                                        Click on my linkedin link to know more about me !
                                        </p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="https://fr.linkedin.com/in/nadjib-belaribi-ba898b13a">
                                                    <i class="fa fa-linkedin"></i>                                                
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>

</body>

</html>