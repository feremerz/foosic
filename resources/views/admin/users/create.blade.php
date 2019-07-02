@extends('admin.layouts.app')
@section('content')

    <h1>ایجاد کاربر جدید</h1>
    <div class="container col-md-6 ">
        @if ($errors->any())
            <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>
        @endif
        <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">نام:</label>
                <input type="text" name="name" class="form-control" placeholder="نام">
            </div>
            <div class="form-group">
                <label for="email">ایمیل:</label>
                <input type="text" name="email" class="form-control" placeholder="ایمیل">
            </div>
            <div class="form-group">
                <label for="password">رمز عبور:</label>
                <input type="password" name="password" class="form-control" placeholder="رمز عبور">
            </div>
            <div class="form-group">
                <label for="roles[]">نقش ها:</label>
                <select multiple  name="roles[]" class="form-control" >
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">وضعیت:</label>
                <select name="status" class="form-control">
                    <option value="0">غیرفعال</option>
                    <option value="1" selected>فعال</option>
                </select>
            </div>
            <div class="form-group">
                <label for="file">تصویر:</label>
                <input type="file" name="file" class="form-control-file" multiple>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">ثبت کاربر</button>
            </div>
        </form>
    </div>
@endsection