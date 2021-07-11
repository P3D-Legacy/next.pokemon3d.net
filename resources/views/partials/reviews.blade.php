<div id="reviewbox" class="col-12 row p-3">
    <h2 class="col-12 text-dark  crystal-textbox text-center">Reviews</h2>
    <div class="collapse col-12 m-2 " id="collapseReview" aria-expanded="false">
        @foreach($reviews as $review)
            @if(($loop->iteration-1) % 2 == 0)
                <div class="row col-12">
                    @endif
                    <div class="col-12 col-sm-6">
                        <div class="text-dark crystal-textbox text-center">
                            <div class="col-10 offset-1">
                                <img src="{{  $review->stars >= 1 ? asset('images/mon/staryu.png') : asset('images/mon/staryu_bw.png')   }}" class="col-2" />
                                <img src="{{  $review->stars >= 2 ? asset('images/mon/staryu.png') : asset('images/mon/staryu_bw.png')   }}" class="col-2" />
                                <img src="{{  $review->stars >= 3 ? asset('images/mon/staryu.png') : asset('images/mon/staryu_bw.png')   }}" class="col-2" />
                                <img src="{{  $review->stars >= 4 ? asset('images/mon/staryu.png') : asset('images/mon/staryu_bw.png')   }}" class="col-2" />
                                <img src="{{  $review->stars >= 5 ? asset('images/mon/staryu.png') : asset('images/mon/staryu_bw.png')   }}" class="col-2" />
                                <br/>
                            @if($review->stars == null || $review->stars == 0) (No rating) @else &nbsp; @endif
                            </div>
                            {{$review->text}}
                            <hr class="align-text-bottom"/>
                            <span class="align-text-bottom">- {{$review->name}}</span>
                        </div>
                    </div>
                    @if(($loop->iteration) % 2 == 0)
                </div>
            @endif
    @endforeach

    </div>
    </div>
<div class="col-12 align-items-center">
<button role="button" id="reviewCollapseButton" class="col-12 offset-sm-5 col-sm-6 crystal-textbox showoff_item collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseReview"></button>
</div>
