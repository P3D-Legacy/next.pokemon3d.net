@extends('layouts.master')

@section('content')
    <div class="bordered-section-container ">
        <div class="bg-transparent bordered-section row mt-5 p-3">
            <div class="wow fadeInRight col-12 pt-4">

                <div class="col-12 col-md-8 offset-md-2">
                    <div class="row">
                        <img class="col-12 col-md-8 offset-md-2 mb-4 img-fluid img-auto-h"
                             src="{{asset('images/logo_p3d_new.png')}}"/>
                        <img class="col-12 col-md-3 offset-md-2 mb-4 img-fluid img-auto-h"
                             src="{{route('trainercard.getUrl', ['background' => $bg, 'name' => $name])}}">
                        <div class="col-12 col-md-5  mb-4 ">
                            <label class="crystal-textbox">BBcode</label>
                            <div class="crystal-textbox col-12 w-100">[img]{{route('trainercard.getUrl', ['background' => $bg, 'name' => $name])}}[/img]</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
