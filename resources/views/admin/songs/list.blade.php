@extends('admin.layouts.master')
@section('content')

    <table id="mytable" class="table table-hover bg-white  ">

        <thead >

        <th><input type="checkbox" id="checkall"/></th>
        <th>نوع</th>
        <th>خواننده</th>
        <th>نام</th>
        <th>Name</th>
        <th>نامک</th>
        <th>قیمت</th>
        <th>تاریخ</th>
        <th>بازدید</th>
        <th>وضعیت</th>
        <th>ویرایش</th>

        </thead>
        <tbody>
        @foreach($songs as $song)
            <tr class="border border-light">
                <td><input type="checkbox" class="checkthis"/></td>
                <td>{{$song->is_album ? 'آلبوم' : 'آهنگ'}}</td>
                <td>
                    @foreach($song->artists()->where('art_id',1)->get() as $artist)
                    {{ $artist->name}}
                @endforeach
                </td>
                <td>{{$song->name}}</td>
                <td>{{$song->engName}}</td>
                <td>{{$song->slug}}</td>
                <td>{{$song->price}}</td>
                <td>{{\Morilog\Jalali\Jalalian::forge($song->created_at)->format('%d %B %Y')}}</td>
                <td>{{$song->viewCount}}</td>
                <td>{{$song->status}}</td>

                <td>
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{route('songs.edit',[$song->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</a>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$songs->links()}}

@endsection