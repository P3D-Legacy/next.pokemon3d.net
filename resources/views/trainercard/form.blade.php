@extends('layouts.master')

@section('content')

    <div class="bordered-section-container ">
        <div class="bg-transparent bordered-section row mt-5 p-3">
            <div class="wow fadeInRight col-12 pt-4">

                <div class="col-12 col-md-8 offset-md-2">
                    <div class="row">
                        <img class="row col-12 col-md-8 offset-md-2 mb-4 img-fluid img-auto-h"
                             src="{{asset('images/logo_p3d_new.png')}}"/>
                        <form action="{{route('trainercard.generate')}}">

                            <div class="col-12 col-md-8 offset-md-2">
                                <label class="col-4 crystal-textbox" for="name">Player name:</label>
                                <input type="text" name="name" class="col-6 offset-1 crystal-textbox">
                            </div>


                            <label class="form-label col-12 crystal-textbox" for="background">Background</label>
                            <div class=" row ">
                                <div class="col-12 row p-4">
                                @foreach(\App\CustHelpers\TrainercardHelper::BACKGROUNDS as $id => $background)
                                    <div target-input="bg_radio_{{$id}}"
                                         class="@if($loop->iteration == 1) selectBox-square-selected @endif showoff_item selectBox-square crystal-textbox col-12  col-md-2">

                                        <label class="h-25 align-content-center w-100 text-center"> {{$background['name']}}</label>
                                        @if($id != \App\CustHelpers\TrainercardHelper::BACKGROUND_CLEAR)
                                            <div class="h-50 align-content-center w-100"
                                                 style="background: url('{{asset($background['filling'])}}');">
                                            </div>
                                        @else
                                            <div class="h-50 w-100" style="background:{{$background['filling']}};">
                                            </div>
                                        @endif

                                    </div>
                                    <input data-selector="bg_radio_{{$id}}" class="selectBox-input d-none" type="radio" @if($loop->iteration == 1) checked @endif
                                           name="background"
                                           value="{{$id}}">
                                @endforeach
                                </div>
                            </div>
                            <button class="crystal-textbox showoff_item col-12">Create trainercard</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
