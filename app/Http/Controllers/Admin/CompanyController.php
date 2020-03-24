<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth_type:1');
    }

    public function index()
    {
        $rows = Company::latest()->paginate($this->web_paginate_num);
        return view('admin.pages.company.index',compact('rows'));
    }

    public function create()
    {
        $company = new Company;
        return view('admin.pages.company.form',compact('company'));
    }


    public function store(CompanyRequest $request)
    {
        $inputs = $request->except('logo');
        $inputs['token'] = md5(microtime());
        $company = Company::create($inputs);
        if ($request->logo)
            $this->upload($request->logo,$company);
        return redirect()->back()->with('message','Done Successfully');
    }


    public function show($id)
    {

    }


    public function edit(Company $company)
    {
        return view('admin.pages.company.form',compact('company'));
    }


    public function update(CompanyRequest $request, Company $company)
    {
        $inputs = $request->except('logo');
        $company->update($inputs);
        if ($request->logo)
            $this->upload($request->logo,$company,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Company $company)
    {
        $company->trash();
        return redirect()->back()->with('message','Done Successfully');
    }
}
