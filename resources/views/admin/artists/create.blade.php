@extends('admin.layouts.master')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                ایجاد آرتیست جدید
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form method="post" action="{{route('artists.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="نام آرتیست">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                            <input type="text" name="engName" class="form-control" placeholder="نام انگلیسی">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input type="text" name="slug" class="form-control text-left" placeholder="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-modx"></i></span>
                            <select name="art_id" class="form-control">
                                <option value="1" selected>خواننده</option>
                                <option value="2" >آهنگ ساز</option>
                                <option value="3" >تنظیم کننده</option>
                                <option value="4" >شاعر</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                            <select multiple name="categories[]" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                            <input type="text" name="instagram" class="form-control text-left" placeholder="Instagram">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                            <input type="text" name="telegram" class="form-control text-left" placeholder="Telegram">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-quote-right"></i></span>
                            <textarea  name="description" class="form-control" placeholder="توضیحات"></textarea>
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
                        <button class="btn btn-success" type="submit">ثبت آرتیست جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection