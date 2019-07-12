@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class=" col-md-3">
            <img width="180" height="180" src="{{ asset($artist->photo->url) }}">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    ویرایش آرتیست {{$artist->name}}
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form method="post" action="{{route('artists.update',[$artist->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="نام آرتیست" value="{{$artist->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <input type="text" name="engName" class="form-control" placeholder="نام انگلیسی" value="{{$artist->engName}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" name="slug" class="form-control text-left" placeholder="slug" value="{{$artist->slug}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-modx"></i></span>
                                <select name="art_id" class="form-control" >
                                    <option value="1" {{($artist->art_id==1) ? 'selected' : ''}}>خواننده</option>
                                    <option value="2" {{($artist->art_id==2) ? 'selected' : ''}}>آهنگ ساز</option>
                                    <option value="3" {{($artist->art_id==3) ? 'selected' : ''}}>تنظیم کننده</option>
                                    <option value="4" {{($artist->art_id==4) ? 'selected' : ''}}>شاعر</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select multiple name="categories[]" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $artist->categories->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                <input type="text" name="instagram" class="form-control text-left" placeholder="Instagram" value="{{$artist->instagram}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                <input type="text" name="telegram" class="form-control text-left" placeholder="Telegram" value="{{$artist->telegram}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-quote-right"></i></span>
                                <textarea  name="description" class="form-control" placeholder="توضیحات">{{$artist->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>
                                <select name="status" class="form-control">
                                    <option value="0" {{ $artist->status==0 ? 'selected' : '' }}>غیرفعال</option>
                                    <option value="1" {{ $artist->status==1 ? 'selected' : '' }}>فعال</option>
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
                            <button class="btn btn-success" type="submit">بروزرسانی آرتیست</button>
                        </div>
                    </form>
                    <form method="post" action="{{route('artists.destroy',[$artist->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <button class="btn btn-danger" type="submit">حذف آرتیست</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection