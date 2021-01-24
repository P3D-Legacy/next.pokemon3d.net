<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>{{config('app.name')}}</title>
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <meta name="theme-color" content="#7952b3">


</head>
<body class="bg-summer">

<nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand col-6 col-lg-2" href="#">
            <img class="w-100 img-fluid" src="{{asset('images/logo_p3d.png')}}"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{asset('images/favicon.png')}}">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Wiki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Github</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Discord</a>
                </li>
                <li class="nav-item dropstart">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" data-bs-popperConfig="{placement: 'left-end'}" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">News</a></li>
                        <li><a class="dropdown-item" href="#">Resources</a></li>
                        <li><a class="dropdown-item" href="#">Skin Changer</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main id="app" class="container mw-unset ps-0 pe-0">

    <div class="bordered-section-container">
        <div class="bg-transparent bordered-section row p-3">
            <div class="col-sm-12 col-md-4">
                <img class="img-fluid" src="{{asset('images/nilllzz.png')}}">
            </div>

            <div class="col-sm-12 col-md-8 pt-4">
                <img class="col-8 offset-2 mb-4 img-fluid" src="{{asset('images/logo_p3d.png')}}"/>
                <p>
                    Pokémon 3D is a video game originally created by Nilllzz. It is heavily inspired by Minecraft, and
                    the Pokémon series. Pokémon 3D focused on the strong points of Pokémon Gold and Silver versions and
                    their remakes, and gives players a taste as to how the once 2D world they knew was in 3D. They could
                    even see through the eyes of their own trainer.
                </p>
                <p>
                    <a class="btn btn-success btn-lg" href="#">
                        <span class="fa fa-download"></span> Download Game
                    </a>
                </p>
                <p>
                    <small>
                        Read more about the technical stuff about the game <a class="link-theme" href="#">here</a>.
                    </small>
                </p>
            </div>
        </div>
    </div>

    <div class="sections-holder">
        <div class="bordered-section-container">
            <div class="seperator-checkerboard inverted"></div>
            <div class="bg-dark bordered-section row p-3">
                <div class="col-sm-12 col-md-8 pt-4">
                    <h2 class="display-5">Nostalgia</h2>
                    <p class="lead">Remember the old days when you where playing on a GameBoy? If so; you should try out
                        this game and get the nostalgic feeling as well as visit your inner child.</p>
                </div>
                <img class="d-block col-sm-12 col-md-2 offset-md-1 img-fluid"
                     src="{{asset('images/mon/pikachu.png')}}">
            </div>
            <div class="seperator-checkerboard"></div>
        </div>

        <div class="bordered-section-container">
            <div class="bg-transparent row p-3">
                <img class="d-block col-sm-12 col-md-2 offset-md-1 img-fluid" src="{{asset('images/mon/rhydon.png')}}">
                <div class="col-sm-12 col-md-8 pt-4">
                    <h2 class="display-5">All Generations and Regions</h2>
                    <p class="lead">Pokémon 3D will in the future have support for all generations of pokémon. And all
                        the regions will accessible in the game.</p>
                </div>
            </div>
        </div>

        <div class="bordered-section-container">
            <div class="seperator-checkerboard inverted"></div>
            <div class="bg-dark bordered-section row p-3">
                <div class="col-sm-12 col-md-8 pt-4">
                    <h2 class="display-5">A New Experience</h2>
                    <p class="lead">Pokémon 3D focused on the strong points of Pokémon Gold and Silver versions and
                        their remakes, and gives players a taste as to how the once 2D world they knew was in 3D.</p>
                </div>
                <img class="d-block col-sm-12 col-md-2 offset-md-1 img-fluid" src="{{asset('images/mon/scizor.png')}}">
            </div>
            <div class="seperator-checkerboard"></div>
        </div>


        <div class="bordered-section-container">
            <div class="bg-transparent row p-3">
                <div class="col-12 pt-4 text-center col-12 row">
                    <h2 class="display-5">What does the media say about Pokémon 3D?</h2>
                    <a href="#" class="d-block p-3 col-sm-12 col-md-3"><img class="img-fluid" src="{{asset('images/polygon-white-alt2.png')}}"></a>
                    <a href="#" class="d-block p-3 col-sm-12 col-md-3"><img class="img-fluid" src="{{asset('images/kotaku-white.png')}}"></a>
                    <a href="#" class="d-block p-3 col-sm-12 col-md-3"><img class="img-fluid" src="{{asset('images/superlevel-white.png')}}"></a>
                    <a href="#" class="d-block p-3 col-sm-12 col-md-3"><img class="img-fluid" src="{{asset('images/theverge-white.png')}}"></a>
                </div>
            </div>
        </div>
    </div>

</main>
<div class="bg-transparent-dark bordered-section-container">
    <div class="seperator-checkerboard inverted"></div>
    <footer class=" py-5 bg-dark">
        <div class="row">
        <div class="col-12 p-4">
            <img src="{{asset('images/favicon.png')}}">
            Pokémon 3D is not affiliated with Nintendo, Creatures Inc. or GAME FREAK Inc.
            <br/>
            pokemon3d.net is owned and operated by Infihex
            <br/>
            <small>© 2014-{{now()->format('Y')}}, Infihex</small>
        </div>
        </div>
    </footer>
</div>

<script src="{{asset('js/main.js')}}"></script>


</body>
</html>
