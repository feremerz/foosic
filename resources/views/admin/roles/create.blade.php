@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ایجاد نقش جدید
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('roles.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام نقش">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="isAdmin" />مدیر</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" name="isDefault">پیش فرض</label>
                        </div>
                    </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">ثبت نقش جدید</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection