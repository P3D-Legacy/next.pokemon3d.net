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
    <body class="bg-{{(new \App\CustHelpers\StatsHelper())->getInGameSeason()}}">
<nav class="navbar navbar-expand-lg navbar-dark animated slideInDown crystal-textbox fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand col-3 col-md-1 align-content-center" href="#">
            <img class="col-md-8 col-12 img-fluid" src="{{asset('images/logo_p3d_new.png')}}"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{asset('images/favicon.png')}}">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" @if(Illuminate\Support\Facades\Route::current()->getName() == 'index') id="nav-current"  aria-current="page"  href="#" @else href="{{route('index')}}" @endif> Home</a>
                </li>
{{--                <li class="nav-item">
                    <a class="nav-link" @if( Illuminate\Support\Str::contains(Illuminate\Support\Facades\Route::current()->getName(),'trainercard.')) id="nav-current"  aria-current="page"  href="#" @else href="{{route('trainercard.index')}}" @endif>Trainercard</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#downloadModal" href="#"><i class="fa fa-download"></i> Download <sup class=" mt-0 p-1 badge bg-dark text-light">{{(new \App\CustHelpers\GitHubHelper())->getVersion()}}</sup></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{config('xenforo.base_web_url')}}">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://pokemon3d.net/wiki/">Wiki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank"  href="https://github.com/P3D-Legacy/P3D-Legacy"><i class="fab fa-github"></i> <span class="display-sm d-md-none">Github</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{config('discord.invite_url')}}"><i class="fab fa-discord"></i> <span class="display-sm d-md-none">Discord</span></a>
                </li>
                <li class="nav-item dropstart">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" data-bs-popperConfig="{placement: 'left-end'}" aria-expanded="false">
                        More
                    </a>
                    <ul class="crystal-textbox dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{config('xenforo.base_web_url')}}/news/">News</a></li>
                        <li><a class="dropdown-item" href="{{config('xenforo.base_web_url')}}/resources/">Resources</a></li>
                        <li><a class="dropdown-item" href="https://skin.pokemon3d.net/">Skin Changer</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main id="app" class="container mw-unset mt-5 ps-0 pe-0">

    @yield('content')

</main>
<div class="bg-transparent-dark bordered-section-container">
    <div class="seperator-checkerboard inverted"></div>
    <footer class="text-light py-5 bg-dark">
        <div class="row">
            <div class="col-12 col-md-8 p-4">
                <img src="{{asset('images/favicon.png')}}">
                Pokémon 3D is not affiliated with Nintendo, Creatures Inc. or GAME FREAK Inc.
                <br/>
                pokemon3d.net is owned and operated by Infihex
                <br/>
                <small>This website is <a href="https://github.com/P3D-Legacy/pokemon3d.net">open-source</a> and is created by our <a href="https://github.com/P3D-Legacy/pokemon3d.net/graphs/contributors">contributors</a>.</small>
            </div>
            <div class="col-12 col-md-4 p-4">
            @include('partials.players')
            </div>
        </div>
    </footer>
</div>
<modal>
    <div class="modal show row p-2" id="downloadModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content crystal-textbox ">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    @include('partials.downloadbox')
                </div>
            </div>
        </div>
    </div>
</modal>

<script src="{{asset('js/main.js')}}"></script>


</body>
</html>
