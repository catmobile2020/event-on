<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Company;
use App\Event;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use Carbon\Carbon;
use MacsiDigital\Zoom\Zoom;

class EventController extends Controller
{
    use UploadImage;
    public function __construct()
    {
        $this->middleware('auth_type:1')->except('edit','update','myEvents','fireEvent');
    }

    public function index(Company $company)
    {
        $rows = $company->events()->latest()->paginate($this->web_paginate_num);
        return view('admin.pages.event.index',compact('company','rows'));
    }

    public function create(Company $company)
    {
        $event = new Event();
        $admins = Admin::sales()->get();
        return view('admin.pages.event.form',compact('company','event','admins'));
    }

    public function store(Company $company,EventRequest $request)
    {
        $inputs = $request->except('photo');
        $event = $company->events()->create($inputs);
        $event->admins()->sync($request->admin_ids);
        if ($request->photo)
            $this->upload($request->photo,$event);

        $start_date =Carbon::parse($request->end_date);
        $zoom = new Zoom();
        try
        {
            $zoom_password = rand(0000000,9999999);
            $zoom_user = $zoom->user->find('ibrahimm@cat.com.eg');
            $meeting = $zoom_user->webinars()->create([
                "topic" => $request->name,
                "agenda" => strip_tags($request->description),
                "type" => 2,
                "password" => $zoom_password,
                "duration" => 60*8,
                "start_time" => $start_date->format('Y-m-d\TH:i:s'),
            ]);
            $event->update([
                'zoom_link'=>$meeting->join_url,
                'meeting_id'=>$meeting->id,
                'zoom_password'=>$zoom_password,
            ]);
        }catch (\Exception $exception)
        {
            return back()->with('message',$exception->getMessage());
        }
        return redirect()->back()->with('message','Done Successfully');
    }

    public function show(Company $company,Event $event)
    {

    }

    public function edit(Company $company,Event $event)
    {
        $admins = Admin::sales()->get();
        return view('admin.pages.event.form',compact('company','event','admins'));
    }

    public function update(Company $company,EventRequest $request,Event $event)
    {
        $inputs = $request->except('photo');
        $event->update($inputs);
        $event->admins()->sync($request->admin_ids);
        if ($request->photo)
            $this->upload($request->photo,$event,null,true);
        return redirect()->back()->with('message','Done Successfully');
    }

    public function destroy(Company $company,Event $event)
    {
        $event->trash();
        return redirect()->back()->with('message','Done Successfully');
    }

    public function myEvents()
    {
        $auth_user = auth()->user();
        $rows = $auth_user->events()->orderBy('start_date')->paginate($this->web_paginate_num);
        return view('admin.pages.event.index',compact('rows'));
    }

    public function fireEvent(Company $company,Event $event)
    {
        $auth_user = auth()->user();
        $api_key = env('ZOOM_KEY');
        $api_sercet = env('ZOOM_SECRET');
        $role =1;
        $signature = $this->generate_signature($api_key,$api_sercet,$event->meeting_id,$role);

        return view('site.pages.event.default',compact('event','auth_user','signature','api_key','role'));
    }

    function generate_signature ( $api_key, $api_sercet, $meeting_number, $role){

        $time = time() * 1000; //time in milliseconds (or close enough)

        $data = base64_encode($api_key . $meeting_number . $time . $role);

        $hash = hash_hmac('sha256', $data, $api_sercet, true);

        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);

        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }
}
