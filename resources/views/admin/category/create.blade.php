@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ایجاد دسته بندی جدید
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام دسته بندی">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input type="text" name="slug" class="form-control" placeholder="نامک">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">ثبت دسته بندی جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection