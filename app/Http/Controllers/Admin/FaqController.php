<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Company $company)
    {
        $rows = $company->faqs()->latest()->paginate($this->web_paginate_num);
        return view('admin.pages.faq.index',compact('company','rows'));
    }

    public function create(Company $company)
    {
        $faq = new Faq();
        return view('admin.pages.faq.form',compact('company','faq'));
    }

    public function store(Company $company,FaqRequest $request)
    {
        $company->faqs()->create($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }

    public function show(Company $company,Faq $faq)
    {

    }

    public function edit(Company $company,Faq $faq)
    {
        return view('admin.pages.faq.form',compact('company','faq'));
    }

    public function update(Company $company,FaqRequest $request,Faq $faq)
    {
        $faq->update($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Company $company,Faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('message','Done Successfully');
    }
}
