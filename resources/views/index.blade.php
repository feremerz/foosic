@extends('layouts.master')
@section('title')
    <title>دانلود آهنگ | فوسیک</title>
@stop
@section('content')

        @foreach($songs as $song)
        <div class="w3-container  w3-card w3-white w3-round  w3-margin-bottom"><br>

            <span class="w3-left w3-opacity">{{\Morilog\Jalali\Jalalian::forge($song->created_at)->format('%d %B %Y')}}</span>

            <a class="w3-" href="{{route('music.show',$song->id)}}"><h4 style="display: inline;" class="w3-inline">{{$song->is_album ? 'دانلود آلبوم' : 'دانلود آهنگ'}} {{$song->artists()->where('art_id',1)->first()->name}} - {{$song->name}}</h4></a></a><br>
            <hr class="w3-clear">
            <p><h4>دانلود</h4>
            </p>
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half">
                    <img src="/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                    <img src="/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
                </div>
            </div>
            <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
        </div>
            @endforeach

@endsection