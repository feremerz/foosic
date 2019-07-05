<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleStore;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::paginate(10);
        return view('admin.roles.list',compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStore $request)
    {
        $validData= $request->validated();
        if(!$request->has('isAdmin')){
            $isAdmin = 0;
        } else {
            $isAdmin = 1;
        }
        if(!$request->has('isDefault')){
            $isDefault = 0;
        } else {
            $isDefault = 1;
        }
        $role=Role::create([
            'name' => $validData['name'],
            'isAdmin'=>$isAdmin,
            'isDefault'=>$isDefault,
        ]);
        $role->save();
        return redirect(route('roles.index'))->with('success','نقش جدید با موفقیت اضافه شد!');;
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
       $role=Role::findOrFail($id);
       return view('admin.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleStore $request, $id)
    {
        $role=Role::findOrFail($id);
        $validData=$request->validated();
        if(!$request->has('isAdmin')){
            $isAdmin = 0;
        } else {
            $isAdmin = 1;
        }
        if(!$request->has('isDefault')){
            $isDefault = 0;
        } else {
            $isDefault = 1;
        }
        $role->name=$validData['name'];
        $role->isAdmin=$isAdmin;
        $role->isDefault=$isDefault;
        $role->save();
        return redirect(route('roles.index'))->with('success','نقش با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::findOrFail($id);
        $role->delete();
        return redirect(route('roles.index'))->with('info','نقش با موفقیت حذف شد!');
    }
}
