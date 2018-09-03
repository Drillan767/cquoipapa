<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <title>CKoiPapa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
</head>
<body>

{{-- HEADER --}}

<nav class="navbar navbar-expand-md navbar-light bg-light" id="header">
    <a href="/" class="navbar-brand">
        <img src="img/ckoipapa.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
        <span class="navbar-toggler-icon" />
    </button>
    <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#accueil">Accueil</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#description">Description</a>
            </li>

            <li class="nav-item">
                <button type="button" class="button_contact" data-toggle="modal" data-target="#exampleModal">
                    Contact
                </button>
            </li>
        </ul>
    </div>
</nav>

{{-- HEADER --}}

{{-- CAROUSEL --}}

<div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/elephant.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/lion.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/zebres.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" />
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true" />
        <span class="sr-only">Next</span>
    </a>
</div>

{{-- CAROUSEL --}}

{{-- DESCRIPTION --}}

<div class="container-fluid" id="description">
<div class="row">
    <div class="col-md-3 text-center">
        <img src="img/kidphone.jpg" alt="">
    </div>
    <div class="col-md-9">
        <div class="description">
            <p>
                Découvrez CKoiPapa, la création d’une Application de reconnaissance de forme représente la volonté conjointe de trois étudiants
                décidés à entreprendre dans le domaine de l’informatique. Cette ambition nous a mené à construire, rédiger
                et peaufiner notre plan d’affaires en nous mettant dans des conditions réelles de création d’entreprise.
            </p>
            <p>
                Pour traduire notre idée par des mots couchés sur le papier nous avons défini, développé et affiné nos envies...
                Une fois redescendus sur terre, nous nous sommes plongés dans le montage de cette « entreprise », au sens
                large du thème, point par point, petit à petit.
            </p>
        </div>
    </div>
</div>

</div>

{{-- DESCRIPTION --}}

{{-- STATISTICS --}}

<div id="stats">

</div>

{{-- STATISTICS --}}

{{-- FOOTER --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="footer">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li class="nav-item">
                <button type="button" class="button_contact" data-toggle="modal" data-target="#exampleModal">
                    Contact
                </button>
            </li>
        </ul>
    </div>

    <div class="justify-content-stretch">
        <span>
            &copy; CkoiPapa - 2018
        </span>
    </div>
</nav>

{{--FOOTER--}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="contacts"></div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>