<?php

namespace App\Http\Controllers\Site;

use App\Company;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\LoginRequest;
use App\Http\Requests\Site\RegisterRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Slakbal\Gotowebinar\Facade\Registrants;
use Slakbal\Gotowebinar\Facade\Webinars;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function getLogin()
    {
//        $from = Carbon::now()->addHour();
//        $to = Carbon::now()->addHours(3);
//
//
//        try {
//            $webinar = Webinars::subject('Event Name again 33')
//                ->description('Event Description again 66666')
//                ->timeFromTo($from, $to)
//                ->timeZone('Africa/Cairo')
//                ->singleSession()
//                ->noEmailReminder()
//                ->noEmailAttendeeFollowUp()
//                ->noEmailAbsenteeFollowUp()
//                ->noEmailConfirmation()
//                ->create();

//            $webinar =  Webinars::webinarKey('7337381247287029516')
//                ->get();

//            $registrant =Registrants::webinarKey('7337381247287029516')
//                ->firstName('huda')
//                ->lastName('ahmed')
//                ->timeZone('Africa/Cairo')
//                ->email('huda@gmail.com')
//                ->resendConfirmation()
//                ->questionsAndComments('Some First Question api')
//                ->create();
//            $registrant = Registrants::webinarKey('7337381247287029516')
//                ->get();
//            return response()->json($webinar);
//        } catch (Slakbal\Gotowebinar\Exception\GotoException $e) {
//            return $e->getMessage();
//        }



//        https://app.gotomeeting.com/index.html?meetingid=675824501








     return view('site.pages.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->email;
        $row = User::where('email',$email)->first();
        if ($row)
        {
            if ($row->active ==0)
            {
                return redirect()->back()->with('message','Your Account Is DisActive Back To Admin');
            }
            if (Hash::check($request->password,$row->password))
            {
                auth('web')->login($row,$request->remember);
                return redirect()->intended('/home');
            }
        }
        return redirect()->back()->with('message','Error Your Credential is Wrong');
    }

    public function getRegister($token)
    {
        if (!$company = Company::where('token',$token)->first())
        {
            return abort(404);
        }
        $countries = Country::active()->get();
        return view('site.pages.auth.register',compact('company','countries'));
    }

    public function postRegister($token,RegisterRequest $request)
    {
        if (!$company = Company::where('token',$token)->first())
        {
            return abort(404);
        }
        $inputs = $request->all();
        $inputs['type'] = 2;

        $user =$company->users()->create($inputs);
        auth('web')->login($user,$request->remember_me);
        return redirect()->intended('/home');
    }

    public function logout()
    {
        auth('web')->logout();
        request()->session()->invalidate();
        return redirect()->route('site.login');
    }
}
