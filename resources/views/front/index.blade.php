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
    <a href="/" class="navbar-brand">CKoiPapa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar7">
        <span class="navbar-toggler-icon" />
    </button>
    <div class="navbar-collapse collapse justify-content-stretch" id="navbar7">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#accueil">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#presentation">Présentation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#gallerie">Gallerie</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>

{{-- HEADER --}}

{{-- CAROUSEL --}}

<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active" />
        <li data-target="#carousel" data-slide-to="1" />
        <li data-target="#carousel" data-slide-to="2" />
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://placekitten.com/g/2000/1000" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://placekitten.com/g/2000/1000" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://placekitten.com/g/2000/1000" alt="Third slide">
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
        <img src="https://placekitten.com/g/200/300" alt="">
    </div>
    <div class="col-md-9">
        <div class="description">
            <p>
                Marfa mixtape unicorn, snackwave venmo poutine leggings artisan pitchfork chambray helvetica. Adaptogen locavore tilde, taiyaki food truck selfies umami poke iceland. Neutra taxidermy freegan la croix copper mug, iceland pok pok pinterest celiac yuccie. Raclette shoreditch offal fingerstache, etsy scenester lo-fi cloud bread typewriter pork belly man braid shaman tofu brooklyn keytar. Authentic tumblr retro, jianbing pitchfork raclette beard raw denim farm-to-table. Art party edison bulb forage offal.
            </p>
            <p>
                Man braid craft beer direct trade wolf subway tile tofu. Scenester raclette irony tote bag, PBR&B fixie +1 offal. Tumeric fam hammock DIY succulents taxidermy snackwave, salvia tbh. Hashtag biodiesel squid, portland listicle vape lo-fi. Marfa offal jean shorts, snackwave artisan chicharrones occupy quinoa keytar. VHS deep v seitan, messenger bag palo santo pitchfork hella forage.
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

{{--DOWNLOAD--}}

<div id="download" class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <img src="{{asset('img/gplay.png')}}" alt="">
        </div>
        <div class="col-md-3 text-center">
            <img src="https://placekitten.com/g/200/300" alt="">
        </div>
    </div>
</div>

{{-- DOWNLOAD --}}

{{-- FOOTER --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="#">Mentions légales</a>
            <a class="nav-item nav-link" href="#">Politique de confidentialité</a>
            <a class="nav-item nav-link" href="#">Contact</a>
        </div>
    </div>

    <div class="justify-content-stretch">
        <span>
            &copy; CkoiPapa - 2018
        </span>
    </div>
</nav>

{{--FOOTER--}}


<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>