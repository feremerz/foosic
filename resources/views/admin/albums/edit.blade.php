@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ویرایش آلبوم{{$album->name}}
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('albums.update',$album->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام آلبوم" value="{{$album->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="release_date" class="form-control" placeholder="تاریخ انتشار" value="{{$album->release_date}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="text" name="price" class="form-control" placeholder="قیمت" value="{{$album->price}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input type="text" name="slug" class="form-control" placeholder="نامک" value="{{$album->slug}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-compress"></i></span>
                            <select multiple name="artists[]" class="form-control">
                                @foreach($artists as $artist)
                                    <option value="{{ $artist->id }}" {{ $album->artists->contains($artist->id) ? 'selected' : '' }}>{{ $artist->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="float-right ml-3">
                        <button class="btn btn-success" type="submit">ویرایش آلبوم</button>
                    </div>
                </form>
                <form method="post" action="{{route('albums.destroy',[$album->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <button class="btn btn-danger" type="submit">حذف آلبوم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection