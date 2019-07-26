<?php

namespace App\Http\Controllers\Admin;


use App\Artist;
use App\Category;
use App\File;
use App\Http\Requests\Admin\SongStore;
use App\Http\Requests\Admin\SongUpdate;
use App\Photo;
use App\Song;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Morilog\Jalali\Jalalian;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs=Song::with(['artists','files','photo'])->paginate(20);
        //dd($songs);
        return view('admin.songs.list',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $signers=Artist::where('art_id',1)->get();
        $songMakers=Artist::where('art_id',2)->get();
        $arrangements=Artist::where('art_id',3)->get();
        $poets=Artist::where('art_id',4)->get();
       // $albums=Album::orderBy('created_at')->get();
        return view('admin.songs.create',compact(['categories','signers','songMakers','arrangements','poets']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongStore $request)
    {
       // dd($request);
        $validData= $request->validated();

        $song=Song::create([
            'name' => $validData['name'],
            'engName' => $validData['engName'],
            'price' => $validData['price'],
            'is_album' => $validData['is_album'],
            'release_date' => $validData['release_date'],
            'lyrics' => $request['lyrics'],
            'slug' => $request['slug'],
            //'album_id' => $request['album_id'],
            'status'=>$validData["status"],

        ]);
        //dd($song);
        if($files=$request->file('photo')) {
            $t=time();
            foreach ($files as $file){
                $path = $file->move('images/songs', $t . $file->getClientOriginalName());
                $photoUrl= $t . $file->getClientOriginalName();
                $photo=Photo::create([
                    'url'=>$photoUrl,
                    'photosable_type'=>get_class($song),
                    'photosable_id'=>$song->id
                ]);
                $song->photo()->save($photo);
            }
        }
        if($files=$request->file('file128')) {
            $t='';
            foreach ($files as $file) {
                $songPath = 'dl/songs/' . Jalalian::now()->format('%Y/%m/%d');
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath.'/'.$fileURL,
                    'file_size' => $size,
                    'type' => '3',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        if($files=$request->file('file320')) {
            $t='';
            foreach ($files as $file) {
                $songPath = 'dl/songs/' . Jalalian::now()->format('%Y/%m/%d');
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath.'/'.$fileURL,
                    'file_size' => $size,
                    'type' => '2',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        if($files=$request->file('zip128')) {
            $t='';

            $engName=$request['engName'];
            foreach ($files as $file) {
                $songPath = 'dl/songs/'  . Jalalian::now()->format('%Y/%m/%d') . $engName . '[128]' ;
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath.'/'.$fileURL,
                    'file_size' => $size,
                    'type' => '1',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        if($files=$request->file('zip320')) {
            $t='';
            $engName=$request['engName'];
            foreach ($files as $file) {
                $songPath = 'dl/songs/'  . Jalalian::now()->format('%Y/%m/%d') . $engName . '[320]' ;
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath.'/'.$fileURL,
                    'file_size' => $size,
                    'type' => '0',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        $song->categories()->attach($validData["categories"]);
        $song->artists()->attach($validData["signers"]);
        $song->artists()->attach($request["songMakers"]);
        $song->artists()->attach($request["poets"]);
        $song->artists()->attach($request["arrangements"]);
        $song->save();
        return redirect(route('songs.index'))->with('success','آهنگ جدید با موفقیت اضافه شد!');
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
   // dd($song);
        $categories=Category::all();
        $signers=Artist::where('art_id',1)->get();
        $songMakers=Artist::where('art_id',2)->get();
        $arrangements=Artist::where('art_id',3)->get();
        $poets=Artist::where('art_id',4)->get();
        //$albums=Album::orderBy('created_at')->get();
        $song=Song::where('id',$id)->with(['artists','photo','categories'])->first();
       // dd($song);
        return view('admin.songs.edit',compact(['categories','signers','songMakers','arrangements','poets','song']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SongUpdate $request, $id)
    {dd($request);
        $validData= $request->validated();
        $song=Song::findOrFail($id);
        $song->update([
            'name' => $validData['name'],
            'engName' => $validData['engName'],
            'price' => $validData['price'],
            'is_album' => $validData['is_album'],
            'release_date' => $validData['release_date'],
            'lyrics' => $request['lyrics'],
            'slug' => $request['slug'],
            //'album_id' => $request['album_id'],
            'status'=>$validData["status"],

        ]);
        //dd($song);
        if($files=$request->file('photo')) {
            $t=time();
            foreach ($files as $file){
                $oldPhotos=$song->photo();
                foreach ($oldPhotos as $photo){
                    if(file_exists(public_path().'/images/songs/'. $photo->url))unlink(public_path().'/images/songs/'. $photo->url);
                    $photo->delete();

                }

                $path = $file->move('images/songs', $t . $file->getClientOriginalName());
                $photoUrl= $t . $file->getClientOriginalName();
                $photo=Photo::create([
                    'url'=>$photoUrl,
                    'photosable_type'=>get_class($song),
                    'photosable_id'=>$song->id
                ]);
                $song->photo()->save($photo);
            }
        }
        if($files=$request->file('file128')) {
            $t='';
            foreach ($files as $file) {
                $oldfile128s=$song->files()->where('type',3)->get();
                foreach ($oldfile128s as $oldfile128){
                    if(file_exists(public_path().'/dl/'. $oldfile128->url))unlink(public_path().'/'. $photo->url);
                    $oldfile128->delete();

                }
                $songPath = 'dl/songs/' . Jalalian::now()->format('%Y/%m/%d');
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath . '/'.$fileURL,
                    'file_size' => $size,
                    'type' => '3',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        if($files=$request->file('file320')) {
            $t='';
            foreach ($files as $file) {
                $songPath = 'dl/songs/' . Jalalian::now()->format('%Y/%m/%d');
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath . '/'.$fileURL,
                    'file_size' => $size,
                    'type' => '2',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        if($files=$request->file('zip128')) {
            $t='';

            $engName=$request['engName'];
            foreach ($files as $file) {
                $songPath = 'dl/songs/'  . Jalalian::now()->format('%Y/%m/%d') . $engName . '[128]' ;
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' => $songPath . '/'.$fileURL,
                    'file_size' => $size,
                    'type' => '1',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        if($files=$request->file('zip320')) {
            $t='';
            $engName=$request['engName'];
            foreach ($files as $file) {
                $songPath = 'dl/songs/'  . Jalalian::now()->format('%Y/%m/%d') . $engName . '[320]' ;
                $size = $file->getSize();
                $file->move($songPath, $t . $file->getClientOriginalName());
                $fileURL = $t . $file->getClientOriginalName();
                $file = File::create([
                    'url' =>$songPath . '/'. $fileURL,
                    'file_size' => $size,
                    'type' => '0',
                    'fileable_type' => get_class($song),
                    'fileable_id' => $song->id
                ]);
                $song->files()->save($file);
            }
        }
        $song->categories()->sync($validData["categories"]);
        $song->artists()->sync($validData["signers"]);
        $song->artists()->sync($request["songMakers"]);
        $song->artists()->sync($request["poets"]);
        $song->artists()->sync($request["arrangements"]);
        $song->save();
        return redirect(route('songs.index'))->with('success','آهنگ  با موفقیت ویرایش شد!');
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
