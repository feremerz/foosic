@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ایجاد آهنگ جدید
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('songs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i>نام</span>
                            <input type="text" name="name" class="form-control" placeholder="نام">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i>تاریخ</span>
                            <input type="text" name="release_date" class="form-control" placeholder="تاریخ انتشار">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i>متن</span>
                            <textarea type="text" name="lyrics" class="form-control" placeholder="متن آهنگ"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music"></i>خواننده</span>
                            <select  name="albums[]" class="form-control">
                                @foreach($artists as $artist)
                                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example">
                        <span class="file-custom"></span>
                    </label>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music"></i>آلبوم</span>
                            <select  name="albums[]" class="form-control">
                                @foreach($albums as $album)
                                    <option value="{{$album->id}}">{{$album->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"> <i class="fa fa-music"></i> سبک </span>
                            <select multiple name="categories[]" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-check"></i>وضعیت</span>
                            <select name="status" class="form-control">
                                <option value="0">غیرفعال</option>
                                <option value="1" selected>فعال</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-image"></i>تصویر</span>
                            <input type="file" name="photo" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i>فایل 128</span>
                            <input type="file" name="file128" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i>فایل 320</span>
                            <input type="file" name="file320" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">ثبت آهنگ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection