@extends('admin.layouts.master')
@section('content')

    <table id="mytable" class="table table-hover bg-white  ">

        <thead >

        <th><input type="checkbox" id="checkall"/></th>
        <th>تصویر</th>
        <th>نام</th>
        <th>نوع</th>
        <th>نامک</th>
        <th>سبک</th>
        <th>لایک</th>
        <th>اینستاگرام</th>
        <th>تلگرام</th>
        <th>وضعیت</th>
        <th>ویرایش</th>

        </thead>
        <tbody>
        @foreach($artists as $artist)
            <tr class="border border-light">
                <td><input type="checkbox" class="checkthis"/></td>
                <td><img width="80" height="80" src="{{ asset($artist->photo->url) }}"></td>
                <td>{{$artist->name}}</td>
                <td>
                    <select name="art_id" class="form-control" disabled>
                        <option value="1" {{($artist->art_id==1) ? 'selected' : ''}}>خواننده</option>
                        <option value="2" {{($artist->art_id==2) ? 'selected' : ''}}>آهنگ ساز</option>
                        <option value="3" {{($artist->art_id==3) ? 'selected' : ''}}>تنظیم کننده</option>
                        <option value="4" {{($artist->art_id==4) ? 'selected' : ''}}>شاعر</option>
                    </select></td>
                <td>{{$artist->slug}}</td>


                <td>
                    <ul class="list-group list-group-flush">
                        @foreach($artist->categories as $category)
                            <li class="list-group-item">
                                {{$category->name}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$artist->likeCount}}</td>
                <td>{{$artist->instagram}}</td>
                <td>{{$artist->telegram}}</td>
                <td>
                    @if ($artist->status==1)
                        <span class="badge badge-pill badge-success ">فعال</span>
                    @else
                        <span class="badge badge-pill badge-danger ">غیر فعال</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{route('artists.edit',[$artist->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</a>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$artists->links()}}

@endsection