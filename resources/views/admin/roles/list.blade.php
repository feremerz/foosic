@extends('admin.layouts.master')
@section('content')

    <table id="mytable" class="table table-hover bg-white  ">

        <thead >

        <th><input type="checkbox" id="checkall"/></th>
        <th>نام نقش</th>
        <th>دسترسی مدیر</th>
        <th>پیش فرض</th>
        <th>ویرایش</th>

        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr class="border border-light">
                <td><input type="checkbox" class="checkthis"/></td>
                <td>{{$role->name}}</td>
                <td><input type="checkbox" class="checkthis" disabled {{($role->isAdmin==1) ? 'checked' : '' }} /></td>
                <td><input type="checkbox" class="checkthis" disabled {{($role->isDefault==1) ? 'checked' : '' }} /></td>
                <td>
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{route('roles.edit',[$role->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$roles->links()}}

@endsection