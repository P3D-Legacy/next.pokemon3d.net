@extends('layouts.master')
@section('content')
    <div class="bordered-section-container">
        <div class="bg-transparent bordered-section row p-3">
            <div class="wow fadeInRight col-12 pt-4">

                <div class="col-12 col-sm-8 offset-sm-2">
                    <div class="row">
                        <img class="col-6 mb-4 img-fluid img-auto-h" src="{{asset('images/logo_p3d_new.png')}}"/>
                        <img class="col-4 offset-2 wow zoomIn img-fluid img-nilllzz"
                             src="{{asset('images/players/nilllzz.gif')}}">
                        <p class="crystal-textbox ">
                            Pokémon 3D is a video game originally created by Nilllzz. It is heavily inspired by
                            Minecraft, and
                            the Pokémon series. Pokémon 3D focused on the strong points of Pokémon Gold and Silver
                            versions and
                            their remakes, and gives players a taste as to how the once 2D world they knew was in 3D.
                            They could
                            even see through the eyes of their own trainer.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">@include('partials.newsbox')</div>
                        <div class="col-12 col-sm-6">@include('partials.statistics')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sections-holder">
        <div class="bordered-section-container">
            <div class="seperator-checkerboard inverted"></div>
            <div class="bg-dark bordered-section row p-3">
                <div class="col-sm-12 col-md-8 pt-4  wow fadeInLeftBig ">
                    <h2 class="display-5">Nostalgia</h2>
                    <p class="lead">Remember the old days when you where playing on a GameBoy? If so; you should try out
                        this game and get the nostalgic feeling as well as visit your inner child.</p>
                </div>
                <img class="d-block col-sm-12 col-md-2 offset-md-1 img-fluid wow fadeInRightBig"
                     src="{{asset('images/mon/pikachu.png')}}">
            </div>
            <div class="seperator-checkerboard"></div>
        </div>

        <div class="bordered-section-container">
            <div class="bg-transparent row p-3">
                <img class="d-block col-sm-12 col-md-2 offset-md-1 img-fluid wow fadeInLeftBig"
                     src="{{asset('images/mon/rhydon.png')}}">
                <div class="col-sm-12 col-md-8 pt-4 wow fadeInRightBig text-right">
                    <h2 class="display-5">All Generations and Regions</h2>
                    <p class="lead">Pokémon 3D will in the future have support for all generations of pokémon. And all
                        the regions will accessible in the game.</p>
                </div>
            </div>
        </div>

        <div class="bordered-section-container">
            <div class="seperator-checkerboard inverted"></div>
            <div class="bg-dark bordered-section row p-3">
                <div class="col-sm-12 col-md-8 pt-4 wow fadeInLeftBig">
                    <h2 class="display-5">A New Experience</h2>
                    <p class="lead">Pokémon 3D focused on the strong points of Pokémon Gold and Silver versions and
                        their remakes, and gives players a taste as to how the once 2D world they knew was in 3D.</p>
                </div>
                <img class="d-block col-sm-12 col-md-2 offset-md-1 img-fluid wow fadeInRightBig"
                     src="{{asset('images/mon/scizor.png')}}">
            </div>
            <div class="seperator-checkerboard"></div>
        </div>


        <div class="bordered-section-container fadeInLeftBig">
            <div class="bg-transparent row p-3">
                <div class="col-12 pt-4 text-center col-12">
                    <h2 class="display-5">What does the media say about Pokémon 3D?</h2>
                    <div class="col-12 pt-4 text-center col-12 row">
                        <a href="#" class="media-logo d-block p-3 col-sm-12 col-md-3"><img class="img-fluid"
                                                                                           src="{{asset('images/polygon-white-alt2.png')}}"></a>
                        <a href="#" class="media-logo d-block p-3 col-sm-12 col-md-3"><img class="img-fluid"
                                                                                           src="{{asset('images/kotaku-white.png')}}"></a>
                        <a href="#" class="media-logo d-block p-3 col-sm-12 col-md-3"><img class="img-fluid"
                                                                                           src="{{asset('images/superlevel-white.png')}}"></a>
                        <a href="#" class="media-logo d-block p-3 col-sm-12 col-md-3"><img class="img-fluid"
                                                                                           src="{{asset('images/theverge-white.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>

@endsection
