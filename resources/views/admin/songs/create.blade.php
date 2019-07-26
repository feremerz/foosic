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
                <form  method="post" action="{{route('songs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-check"></i>نوع</span>
                            <select name="is_album" class="form-control">
                                <option value="0" selected>آهنگ</option>
                                <option value="1" >آلبوم</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i>نام</span>
                            <input type="text" name="name" class="form-control" placeholder="نام" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i>نام انگلیسی</span>
                            <input type="text" name="engName" class="form-control" placeholder="نام انگلیسی" value="{{ old('engName') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i>نامک</span>
                            <input type="text" name="slug" class="form-control" placeholder="نامک" value="{{ old('slug') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i>قیمت</span>
                            <input type="text" name="price" class="form-control" value="0" placeholder="قیمت" value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i>تاریخ</span>
                            <input id="tarikh" type="text" name="release_date" value="{{\Morilog\Jalali\Jalalian::now()->format('%Y/%m/%d')}}"  class="form-control release" placeholder="تاریخ انتشار">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i>متن آهنگ</span>
                            <textarea type="text" name="lyrics" class="form-control" placeholder="متن آهنگ" >{{ old('lyrics') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music"></i>خواننده</span>
                            <select multiple name="signers[]" class="form-control">
                                @foreach($signers as $signer)
                                    <option value="{{$signer->id}}">{{$signer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music"></i>آهنگ ساز</span>
                            <select  name="songMakers[]" class="form-control">
                                @foreach($songMakers as $songMaker)
                                    <option value="{{$songMaker->id}}">{{$songMaker->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music"></i>تنظیم کننده</span>
                            <select  name="arrangements[]" class="form-control">
                                @foreach($arrangements as $arrangement)
                                    <option value="{{$arrangement->id}}">{{$arrangement->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music"></i>شاعر</span>
                            <select  name="poets[]" class="form-control">
                                @foreach($poets as $poet)
                                    <option value="{{$poet->id}}">{{$poet->name}}</option>
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
                            <input type="file" name="photo[]" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i>فایل 128</span>
                            <input type="file" name="file128[]" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i>فایل 320</span>
                            <input type="file" name="file320[]" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i>zip 128</span>
                            <input type="file" name="zip128" class="form-control-file" multiple>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i>zip 320</span>
                            <input type="file" name="zip320" class="form-control-file" multiple>
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
