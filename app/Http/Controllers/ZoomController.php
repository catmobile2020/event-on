<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoomRequest;
use App\Register;
use App\User;
use Carbon\Carbon;
use MacsiDigital\Zoom\Zoom;

class ZoomController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $rows = Register::latest()->get();
        return view('zoom.index',compact('rows'));
    }

    public function store(ZoomRequest $request)
    {
        $auth_user = User::first();
        $start_date =Carbon::parse($request->start_date);

        $zoom = new Zoom();
        try
        {

            $zoom_user = $zoom->user->find('ibrahimm@cat.com.eg');
//            $meetings = $zoom->user->find('ibrahimm@cat.com.eg')->meetings()->all();
//            $users = $zoom->user->all();
//            $meeting = $zoom->meeting->find('000000000');
            $meeting = $zoom_user->webinars()->create([
                "topic" => $request->name,
                "type" => 2,
                "duration" => 60*8,
                "start_time" => $start_date->format('Y-m-d\TH:i:s'),
                "settings" => [
                    "audio"=>'voip',
                    "host_video"=>true,
                    "panelists_video"=>true,
                ],
            ]);
            $y =$meeting->panelists()->create([
                'name' => 'mahmoud mohamed',
                'email' => 'm.mohamed@cat.com.eg',
            ]);
//            $x = $meeting->panelists()->create([
//                'name' => 'huda mahmoud',
//                'email' => 'huda.fci@gmail.com',
//            ]);
dd($meeting,$y);
            $auth_user->registers()->create([
                'name'=>$request->name,
                'zoom_link'=>$meeting->join_url,
                'meeting_id'=>$meeting->id,
                'start_date'=>$start_date,
            ]);
        }catch (\Exception $exception)
        {
            dd($exception);
            return back()->with('message',$exception->getMessage());
        }
        return back()->with('message','Created Successfully');
    }

    public function show(Register $register)
    {
        $auth_user = User::first();
        $meeting_number=$register->meeting_id;
        $api_key = env('ZOOM_KEY');
        $api_sercet = env('ZOOM_SECRET');
//        $role = ($auth_user->id == $register->user_id) ? 1 : 0;
        $role =0;
        $signature = $this->generate_signature($api_key,$api_sercet,$meeting_number,$role);
        return view('zoom.show',compact('register','auth_user','signature','meeting_number','api_key'));
    }

    function generate_signature ( $api_key, $api_sercet, $meeting_number, $role){

        $time = time() * 1000; //time in milliseconds (or close enough)

        $data = base64_encode($api_key . $meeting_number . $time . $role);

        $hash = hash_hmac('sha256', $data, $api_sercet, true);

        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);

        //return signature, url safe base64 encoded
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }
    // https://zoom.us/wc/743456057/join
}
