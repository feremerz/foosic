@extends('admin.layouts.master')
@section('content')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            ایجاد کاربر جدید
        </div>
        <div class="card-body">
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
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="نام">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="ایمیل">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="رمز عبور">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <select multiple name="roles[]" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <select name="status" class="form-control">
                            <option value="0">غیرفعال</option>
                            <option value="1" selected>فعال</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-file"></i></span>
                        <input type="file" name="file" class="form-control-file" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">ثبت کاربر</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection