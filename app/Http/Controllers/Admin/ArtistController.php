<?php

namespace App\Http\Controllers\Admin;

use App\Artist;
use App\Category;
use App\Http\Requests\Admin\ArtistStore;
use App\Http\Requests\Admin\ArtistUpdate;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $artists=Artist::with(['photo','categories'])->paginate(10);
        //dd($artists);
        return view('admin.artists.list',compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.artists.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistStore $request)
    {
     //   dd($request);
        $validData=$request->validated();
        $artist=Artist::create([
            'name'=>$validData['name'],
            'slug'=>$validData['slug'],
            'art_id' =>$validData['art_id'],
            'instagram'=>$request['instagram'],
            'telegram'=>$request['telegram'],
            'status'=>$request['status'],
            'likeCount'=>0,
            'description'=>$request['description'],
        ]);
        if($file=$request->file('file')) {
            $t=time();
            $path = $file->move('images/profiles', $t . $file->getClientOriginalName());
            $photoUrl= $t . $request->file('file')->getClientOriginalName();
            $photo=Photo::create([
                'url'=>$photoUrl,
                'photosable_type'=>get_class($artist),
                'photosable_id'=>$artist->id
            ]);
            $artist->photo()->save($photo);
        }
        $artist->categories()->attach($request['categories']);
        $artist->save();
        return redirect(route('artists.index'))->with('success','آرتیست جدید با موفقیت اضافه شد!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist=Artist::findOrFail($id);
        $categories=Category::all();
        return view('admin.artists.edit',compact(['artist','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistUpdate $request, $id)
    {
        $validData=$request->validated();
        $artist=Artist::findOrFail($id);
        $artist->update([
            'name'=>$validData['name'],
            'slug'=>$validData['slug'],
            'art_id' =>$validData['art_id'],
            'instagram'=>$request['instagram'],
            'telegram'=>$request['telegram'],
            'status'=>$request['status'],
            'description'=>$request['description'],
        ]);
        if($file=$request->file('file')) {
            $oldPhoto=Photo::findOrFail($artist->photo->id);
            if(file_exists(public_path().'/'. $artist->photo->url))unlink(public_path().'/'. $artist->photo->url);
            $oldPhoto->delete();

            $t=time();
            $path = $file->move('images/profiles', $t . $file->getClientOriginalName());
            $photoUrl= $t . $request->file('file')->getClientOriginalName();
            $photo=Photo::create([
                'url'=>$photoUrl,
                'photosable_type'=>get_class($artist),
                'photosable_id'=>$artist->id
            ]);
            $artist->photo()->save($photo);
        }
        $artist->categories()->sync($request['categories']);
        $artist->save();
        return redirect(route('artists.index'))->with('success','آرتیست با موفقیت ویرایش شد!');
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
