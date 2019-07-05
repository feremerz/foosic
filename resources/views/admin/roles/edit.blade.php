@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ویرایش نقش {{$role->name}}
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('roles.update',$role->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام نقش" value="{{$role->name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="isAdmin" {{($role->isAdmin) ? 'checked' : ''}} />مدیر</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="isDefault" {{($role->isDefault) ? 'checked' : ''}}>پیش فرض</label>
                        </div>
                    </div>
                    <div class="float-right ml-3">
                        <button class="btn btn-success" type="submit">ویرایش نقش</button>
                    </div>
                </form>
                    <form method="post" action="{{route('roles.destroy',[$role->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <button class="btn btn-danger" type="submit">حذف نقش</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection