@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class=" col-md-3">
        <img width="180" height="180" src="{{ asset($user->photo->url) }}">
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ویرایش کاربر {{$user->name}}
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('users.update',[$user->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام"
                                   value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="ایمیل"
                                   value="{{$user->email}}">
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
                                    +
                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                            <select name="status" class="form-control">
                                <option value="0" {{ $user->status==0 ? 'selected' : '' }}>غیرفعال</option>
                                <option value="1" {{ $user->status==1 ? 'selected' : '' }}>فعال</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i></span>
                            <input type="file" name="file" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="float-right ml-3">
                        <button class="btn btn-success" type="submit">بروزرسانی کاربر</button>
                    </div>
                </form>
                <form method="post" action="{{route('users.destroy',[$user->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <button class="btn btn-danger" type="submit">حذف کاربر</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection