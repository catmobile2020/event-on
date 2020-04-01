<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;

class CityController extends Controller
{
    public function index(Country $country)
    {
        $rows = $country->cities()->latest()->paginate($this->web_paginate_num);
        return view('admin.pages.city.index',compact('country','rows'));
    }

    public function create(Country $country)
    {
        $city = new City();
        return view('admin.pages.city.form',compact('country','city'));
    }

    public function store(Country $country,CityRequest $request)
    {
        $country->cities()->create($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }

    public function show(Country $country,City $city)
    {

    }

    public function edit(Country $country,City $city)
    {
        return view('admin.pages.city.form',compact('country','city'));
    }

    public function update(Country $country,CityRequest $request,City $city)
    {
        $city->update($request->all());
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Country $country,City $city)
    {
        $city->delete();
        return redirect()->back()->with('message','Done Successfully');
    }
}
