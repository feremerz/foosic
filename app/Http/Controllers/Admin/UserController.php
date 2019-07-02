<?php

namespace App\Http\Controllers\Admin;

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
        $users=User::where('status',1)->paginate(10);
        //dd($users);
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
    public function store(Request $request)
    {
       // dd($request);
       $validData= $this->validate($request,[
           'name'=>'required|max:100',
           'email'=>'required|email|unique:users',
           'password'=>'required|min:8',
           'roles'=>'required',
           'status'=>'required',

        ],[
            'name.required'=>'ورود نام الزامی است',
            'email.required'=>'ورود نام الزامی است',
            'password.required'=>'ورود نام الزامی است',
            'roles.required'=>'ورود نام الزامی است'
        ]);


        $user=User::create([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => Hash::make($validData['password']),
            'status'=>$validData["status"],

        ]);
        $photo=null;
        if($file=$request->file('file')) {
            $t=time();
            $path = $file->move('images/profiles', $t . $file->getClientOriginalName());
            $photo= $t . $request->file('file')->getClientOriginalName();
           // $imageUrl=$path . $photo;
            //dd($imageUrl);
        }
        $user->imageUrl=$photo;
        $user->roles()->attach($validData["roles"]);
        $user->save();
        return redirect(route('users.index'));
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
