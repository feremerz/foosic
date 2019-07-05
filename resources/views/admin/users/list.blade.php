@extends('admin.layouts.master')
@section('content')

    <table id="mytable" class="table table-hover bg-white  ">

        <thead >

        <th><input type="checkbox" id="checkall"/></th>
        <th>تصویر</th>
        <th>نام</th>
        <th>ایمیل</th>
        <th>نقش ها</th>
        <th>تاریخ ایجاد</th>
        <th>وضعیت</th>
        <th>ویرایش</th>

        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="border border-light">
                <td><input type="checkbox" class="checkthis"/></td>
                <td><img width="80" height="80" src="{{ asset($user->photo->url) }}"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <ul class="list-group list-group-flush">
                        @foreach($user->roles as $role)
                            <li class="list-group-item">
                                {{$role->name}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($user->created_at)->ago() }}</td>
                <td>
                    @if ($user->status==1)
                        <span class="badge badge-pill badge-success ">فعال</span>
                    @else
                        <span class="badge badge-pill badge-danger ">غیر فعال</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{route('users.edit',[$user->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</a>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$users->links()}}

@endsection