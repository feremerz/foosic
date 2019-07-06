<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Artist;
use App\Http\Requests\Admin\AlbumStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums=Album::paginate(10);
        return view('admin.albums.list',compact(['albums']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists=Artist::all();
        return view('admin.albums.create',compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumStore $request)
    {
        $validData= $request->validated();
        $album=Album::create([
            'name'=>$validData['name'],
            'release_date'=>$validData['release_date'],
            'price'=>$validData['price'],
            'slug'=>$validData['slug']
        ]);
        $album->artists()->attach($validData['artists']);
        $album->save();
        return redirect(route('albums.index'))->with('success','آلبوم جدید با موفقیت اضافه شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::findOrFail($id);
        $artists=Artist::all();
        return view('admin.albums.edit',compact(['album','artists']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumStore $request, $id)
    {
        $album=Album::findOrFail($id);
        $validData= $request->validated();
        $album->name=$validData['name'];
        $album->release_date=$validData['release_date'];
        $album->price=$validData['price'];
        $album->slug=$validData['slug'];
        $album->save();
        return redirect(route('albums.index'))->with('success','آلبوم با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::findOrFail($id);
        $album->delete();
        return redirect(route('albums.index'))->with('info','آلبوم با موفقیت حذف شد!');
    }
}
