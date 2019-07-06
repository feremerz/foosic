@extends('admin.layouts.master')
@section('content')

    <table id="mytable" class="table table-hover bg-white  ">

        <thead >

        <th><input type="checkbox" id="checkall"/></th>
        <th>نام آلبوم</th>
        <th>تاریخ انتشار</th>
        <th>قیمت</th>
        <th>آرتیست ها</th>
        <th>نامک</th>
        <th>ویرایش</th>

        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr class="border border-light">
                <td><input type="checkbox" class="checkthis"/></td>
                <td>{{$album->name}}</td>
                <td>{{$album->release_date}}</td>
                <td>{{$album->price}}</td>
                <td>
                    <ul class="list-group list-group-flush">
                        @foreach($album->artists as $artist)
                            <li class="list-group-item">
                                {{$artist->name}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$album->slug}}</td>
                <td>
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{route('albums.edit',[$album->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$albums->links()}}

@endsection