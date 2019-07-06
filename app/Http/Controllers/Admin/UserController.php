<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserStore;
use App\Http\Requests\Admin\UserUpdate;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('photo')->paginate(10);
        return view('admin.users.list',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
       // dd($request);
       $validData= $request->validated();

        $user=User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => Hash::make($validData['password']),
            'status'=>$validData["status"],

        ]);
        if($file=$request->file('file')) {
            $t=time();
            $path = $file->move('images/profiles', $t . $file->getClientOriginalName());
            $photoUrl= $t . $request->file('file')->getClientOriginalName();
            $photo=Photo::create([
                'url'=>$photoUrl,
                'photosable_type'=>get_class($user),
                'photosable_id'=>$user->id
            ]);
            $user->photo()->save($photo);
        }
        $user->roles()->attach($validData["roles"]);
        $user->save();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles=Role::all();
        return view('admin.users.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request, $id)
    {
        $validData= $request->validated();
        $user=User::findOrFail($id);
        $user->name=$validData['name'];
        $user->email=$validData['email'];
        //dd($validData);
        if(!empty($validData['password'])) {$user->password=Hash::make($validData['password']);}
        $user->status=$validData["status"];

        if($file=$request->file('file')) {
            $oldPhoto=Photo::findOrFail($user->photo->id);
            if(file_exists(public_path().'/'. $user->photo->url))unlink(public_path().'/'. $user->photo->url);
            $oldPhoto->delete();

            $t=time();
            $path = $file->move('images/profiles', $t . $file->getClientOriginalName());
            $photoUrl= $t . $request->file('file')->getClientOriginalName();
            $photo=Photo::create([
                'url'=>$photoUrl,
                'photosable_type'=>get_class($user),
                'photosable_id'=>$user->id
            ]);
            $user->photo()->save($photo);
        }

        $user->roles()->sync($validData["roles"]);
        $user->save();
        return redirect(route('users.index'))->with('success','کاربر با موفقیت ویرایش شد!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $oldPhoto=Photo::findOrFail($user->photo->id);
        if(file_exists(public_path().'/'. $user->photo->url))unlink(public_path().'/'. $user->photo->url);
        $oldPhoto->delete();
        $user->delete();
        return redirect(route('users.index'));

    }
}
