@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ویرایش دسته بندی {{$category->name}}
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام دسته بندی" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input type="text" name="slug" class="form-control" placeholder="نامک" value="{{$category->slug}}">
                        </div>
                    </div>
                    <div class="float-right ml-3">
                        <button class="btn btn-success" type="submit">ویرایش دسته بندی</button>
                    </div>
                </form>
                <form method="post" action="{{route('categories.destroy',[$category->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <button class="btn btn-danger" type="submit">حذف دسته بندی</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection