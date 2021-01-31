<div class="row p-4">
    @foreach(config('team.names') as $teammember)
        <div class="col-4 col-md-2 zoomIn">
            @if(file_exists(public_path('images/players/'. $teammember . '.gif')))
                <img class="img-fluid img wow"  data-bs-toggle="tooltip" title="{{$teammember}}" src="{{asset('images/players/'. $teammember . '.gif')}}"/>
            @else
                <img class="img-fluid img wow"  data-bs-toggle="tooltip" title="{{$teammember}}" src="{{asset('images/players/template.gif')}}"/>
            @endif
        </div>
    @endforeach
</div>
