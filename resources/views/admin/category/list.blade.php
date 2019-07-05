@extends('admin.layouts.master')
@section('content')

    <table id="mytable" class="table table-hover bg-white  ">

        <thead >

        <th><input type="checkbox" id="checkall"/></th>
        <th>نام دسته بندی</th>
        <th>نامک</th>
        <th>ویرایش</th>

        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="border border-light">
                <td><input type="checkbox" class="checkthis"/></td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>
                    <a class="btn btn-primary btn-xs" data-title="Edit" href="{{route('categories.edit',[$category->id])}}">
                        <span class="glyphicon glyphicon-pencil"></span>ویرایش</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>

    {{$categories->links()}}

@endsection