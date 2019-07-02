@extends('admin.layouts.app')
@section('content')


    <table id="mytable" class="table table-bordred table-striped">

        <thead>

        <th><input type="checkbox" id="checkall"/></th>
        <th>تصویر</th>
        <th>نام</th>
        <th>ایمیل</th>
        <th>نقش ها</th>
        <th>تاریخ ایجاد</th>
        <th>وضعیت</th>
        <th>ویرایش</th>
        <th>حذف</th>
        </thead>
        <tbody>
@foreach($users as $user)
        <tr>
            <td><input type="checkbox" class="checkthis"/></td>
            <td><img width="80" height="80" src="{{ asset($user->imageUrl) }}"> </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><ul>
                    @foreach($user->roles as $role)
                        <li>
                            {{$role->name}}
                        </li>
                    @endforeach
                </ul></td>
            <td>{{ \Morilog\Jalali\Jalalian::forge($user->created_at)->ago() }}</td>
            <td>
                @if ($user->status==1)
                    <span class="tag tag-success p-a-1">فعال</span>
                    @else
                    <span class="badge badge-danger">غیر فعال</span>
                @endif
               </td>
            <td>

                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</button>

            </td>
            <td>

                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                        <span class="glyphicon glyphicon-trash"></span>حذف</button>

            </td>
        </tr>
@endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$users->links()}}

@endsection