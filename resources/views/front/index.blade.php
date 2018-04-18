<!DOCTYPE html>

<html>
<head>
    <title>C'est quoi papa ?</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
</head>
<body>

{{-- HEADER --}}

<nav class="navbar navbar-expand-md navbar-light bg-light" id="header">
    <a href="/" class="navbar-brand">Le Stadium</a>
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

<div class="row" id="description">
    <div class="col-md-3">
        <img src="https://placekitten.com/g/200/300" alt="">
    </div>
    <div class="col-md-9">
        <p>
            Marfa mixtape unicorn, snackwave venmo poutine leggings artisan pitchfork chambray helvetica. Adaptogen locavore tilde, taiyaki food truck selfies umami poke iceland. Neutra taxidermy freegan la croix copper mug, iceland pok pok pinterest celiac yuccie. Raclette shoreditch offal fingerstache, etsy scenester lo-fi cloud bread typewriter pork belly man braid shaman tofu brooklyn keytar. Authentic tumblr retro, jianbing pitchfork raclette beard raw denim farm-to-table. Art party edison bulb forage offal.
        </p>
        <p>
            Man braid craft beer direct trade wolf subway tile tofu. Scenester raclette irony tote bag, PBR&B fixie +1 offal. Tumeric fam hammock DIY succulents taxidermy snackwave, salvia tbh. Hashtag biodiesel squid, portland listicle vape lo-fi. Marfa offal jean shorts, snackwave artisan chicharrones occupy quinoa keytar. VHS deep v seitan, messenger bag palo santo pitchfork hella forage.
        </p>
    </div>
</div>

{{-- DESCRIPTION --}}

<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>