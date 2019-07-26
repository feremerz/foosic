@foreach($songs as $song)
    <div class="w3-container  w3-card w3-white w3-round  w3-margin-bottom"><br>

        <span class="w3-left w3-opacity"><i class="fa fa-eye"></i> {{$song->viewCount}}</span>

        <a class="w3-" href="{{route('music.show',$song->slug)}}"><h4 style="display: inline;" class="w3-inline">{{$song->is_album ? 'دانلود آلبوم' : 'دانلود آهنگ'}} {{$song->artists()->where('art_id',1)->first()->name}} - {{$song->name}}</h4></a></a><br>
        <hr class="w3-clear">
        <p class="w3-center"><h4>دانلود</h4>
        </p>
        <div class="w3-row-padding" style="margin:0 -16px">
            @foreach($song->photo as $image)
                <img src="{{asset('images/songs/'.$image->url)}}" style="width:100%" alt="{{$song->is_album ? 'دانلود آلبوم' : 'دانلود آهنگ'}} {{$song->artists()->where('art_id',1)->first()->name}} - {{$song->name}}" class="w3-margin-bottom">
            @endforeach

        </div>
        <div>
                <span class="w3-right">
                    تاریخ: {{\Morilog\Jalali\Jalalian::forge($song->created_at)->format('%d %B %Y')}}
                    |
                    موضوع:
                    @foreach($song->categories as $category)
                        <a href="./category/{{$category->slug}}" title="{{$category->name}}">{{$category->name}}</a>
                    @endforeach
                </span>
            <a href="./music/{{$song->slug}}" class="w3-button w3-theme-d1 w3-margin-bottom w3-left"><i class="fa fa-download"></i> {{$song->is_album ? 'دانلود آلبوم' : 'دانلود آهنگ'}}</a>
        </div>
    </div>
@endforeach