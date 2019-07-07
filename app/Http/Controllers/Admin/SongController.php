<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Artist;
use App\Category;
use App\File;
use App\Http\Requests\Admin\SongStore;
use App\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $artists=Artist::all();
        $albums=Album::orderBy('created_at')->get();
        return view('admin.songs.create',compact(['categories','artists','albums']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongStore $request)
    {
        $validData= $request->validated();

        $song=Song::create([
            'name' => $validData['name'],
            'release_date' => $validData['release_date'],
            'lyrics' => $validData['lyrics'],
            'status'=>$validData["status"],

        ]);
        if($file=$request->file('photo')) {
            $t=time();
            $path = $file->move('images/songs', $t . $file->getClientOriginalName());
            $photoUrl= $t . $request->file('photo')->getClientOriginalName();
            $photo=Photo::create([
                'url'=>$photoUrl,
                'photosable_type'=>get_class($song),
                'photosable_id'=>$song->id
            ]);
            $song->photo()->save($photo);
        }
        if($file=$request->file('file128')) {
            $t=time();
            $songPath='songs/';
            $path = $file->move('songs/songs', $t . $file->getClientOriginalName());
            $fileURL= $t . $request->file('file128')->getClientOriginalName();
            $file=File::create([
                'url'=>$photoUrl,
                'fileable_type'=>3,
                'fileable_id'=>$song->id
            ]);
            $song->photo()->save($photo);
        }

        $song->categories()->attach($validData["categories"]);
        $song->albums()->attach($validData["albums"]);
        $song->save();
        return redirect(route('users.index'))->with('success','کاربر جدید با موفقیت اضافه شد!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
