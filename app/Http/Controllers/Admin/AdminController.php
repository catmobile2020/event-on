<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth_type:1');
    }

    public function index()
    {
        $rows = Admin::sales()->latest()->paginate($this->web_paginate_num);
        return view('admin.pages.admin.index',compact('rows'));
    }

    public function create()
    {
        $admin = new Admin;
        return view('admin.pages.admin.form',compact('admin'));
    }


    public function store(AdminRequest $request)
    {
        $inputs = $request->all();
        $inputs['username'] = str_replace(' ','-',$request->name).rand(00000,99999);
        $admin = Admin::create($inputs);
        if ($request->photo)
            $this->upload($request->photo,$admin);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function show($id)
    {

    }


    public function edit(Admin $admin)
    {
        return view('admin.pages.admin.form',compact('admin'));
    }


    public function update(AdminRequest $request, Admin $admin)
    {
        $inputs = $request->all();
        if (!$request->password)
        {
            unset($inputs['password']);
        }
        $admin->update($request->all());
        if ($request->photo)
            $this->upload($request->photo,$admin,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Admin $admin)
    {
        $admin->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
