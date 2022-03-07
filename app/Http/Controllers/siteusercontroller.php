<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\siteuser;
 

class siteusercontroller extends Controller
{
    protected function index()
    {
        $siteusers = siteuser::paginate(10);
        return view('user', ['siteusers' => $siteusers]);   
    }



    protected function add_user()
    {
        return view('add_user');   
    }

    protected function save_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email|unique:tbluser,email_address',
            'password' => 'required|confirmed|min:5|max:12'
        ]);
    
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
    
            $siteuser = new siteuser;
            $siteuser->email_address   =   $request->email_address; 
            $siteuser->user_pass       =   Hash::make($request->password);         
            $save=$siteuser->save();
    
            if($save){
                //return back()->with('success','New User has been successfuly added to database');
                return redirect('/users')->with('success','New User has been successfuly added to database');
    
             }else{
                 return back()->with('fail','Something went wrong, try again later');
             }
    }

    public function edit_user($id = null)
    {
        $siteuser = siteuser::all()->where('id',$id)->first();
        return view('edit_user', ['siteuser' => $siteuser]);
    }

    protected function update_user(Request $request, $id)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:5|max:12'
        ]);
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $siteuser = siteuser::find($id);
        $siteuser->user_pass       =   Hash::make($request->password);         
        $save=$siteuser->save();

        if($save)
        {
            return redirect('/users')->with('success','New User has been successfuly added to database');            
        }else
        {
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function delete_user($id = null)
    {
        $siteuser = siteuser::find($id);
        $siteuser->delete();
        return redirect('/users');
    }
}
