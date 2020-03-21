<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $rows = Country::latest()->paginate($this->web_paginate_num);
        return view('admin.pages.country.index',compact('rows'));
    }

    public function create()
    {
        $country = new Country;
        return view('admin.pages.country.form',compact('country'));
    }


    public function store(CountryRequest $request)
    {
        Country::create($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }


    public function show($id)
    {

    }


    public function edit(Country $country)
    {
        return view('admin.pages.country.form',compact('country'));
    }


    public function update(CountryRequest $request, Country $country)
    {
        $country->update($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->back()->with('message','Done Successfully');
    }
}
