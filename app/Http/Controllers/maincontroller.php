<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\contact;
use App\Models\projects;
use App\Models\siteuser;
use App\Models\transactions;


class maincontroller extends Controller
{
    protected function index()
    {
        return view('index');
    }

    protected function login()
    {
        return view('login');
    }
    public function logout(){
        if(session()->has('SiteUser')){
            session()->pull('SiteUser');
            return redirect('/login');
        }
    }
    
    protected function login_action(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        $userinfo = siteuser::where('email_address','=',$request->email_address)->first();

        if(!$userinfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userinfo->user_pass)){
                $request->session()->put('SiteUser', $userinfo->id);
                $request->session()->put('SiteUserEmail', $userinfo->email_address);
                return redirect('/');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }        
    }

    
 
}
