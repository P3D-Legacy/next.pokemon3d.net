<div class="col-12 row p-3 ">
    <h2 class="col-12 text-dark text-center">Latest news</h2>
    @foreach(\App\CustHelpers\XenforoHelper::getNewsItems()['threads'] as $item)
        @if($loop->iteration > 5)
            @break
            @endif
            <a href="https://pokemon3d.net/forum/threads/{{$item['thread_id']}}" class="col-12 crystal-textbox pb-2 showoff_item">
                <div class="row">

                        <span><span class="badge badge-t-dark">{{$item['prefix']}}</span>{{$item['title']}}</span>
                        <br/>
                        <span> <span class="badge badge-t-dark">{{Carbon\Carbon::createFromTimestamp($item['post_date'])->format('d-m-Y') }} </span> <img class="img-fluid github-avatar" src="{{$item['User']['avatar_urls']['o']}}"> {{$item['User']['username']}}</span>
                    </div>
            </a>
    @endforeach
</div>
