<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\contact;
use App\Models\projects; 
use App\Models\transactions;

class contactcontroller extends Controller
{
    protected function index()
    {
        $contacts = contact::paginate(10);
        return view('contacts', ['contacts' => $contacts]);
    }
    protected function contact_projects($id=null)
    {
        $contact = contact::where('id','=',$id)->first();
        $projects = projects::where('cust_id','=',$id)->paginate(10);
        return view('contact-projects', ['projects' => $projects,'contact'=>$contact]);
    }

        protected function contact_transactions($id=null)
    {
        $contact = contact::where('id','=',$id)->first();
        $transactions = transactions::where('cust_id','=',$id)->paginate(10);
        return view('contact-transactions', ['transactions' => $transactions,'contact'=>$contact]);
    }

 

    protected function add_contact()
    {
        return view('add_contact');   
    }

    protected function save_contact(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email_address' => 'required|email|unique:tblcontact,customer_email',             
        ]);  
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = new contact;
        $contact->customer_name             =   $request->name; 
        $contact->customer_email            =   $request->email_address; 
        $contact->customer_payment_email    =   $request->payment_email_address; 
        $contact->skype                     =   $request->im; 
        $contact->whatsapp                  =   $request->whatsapp; 
        $contact->note                      =   $request->notes;         
        $save=$contact->save();

        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('/contacts')->with('success','New User has been successfuly added to database');

        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function edit_contact($id = null)
    {
        $contact = contact::all()->where('id',$id)->first();
        return view('edit_contact', ['contact' => $contact]);
    }

    protected function update_contact(Request $request, $id)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email_address' => 'required',             
        ]); 
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $contact = contact::find($id);
        $contact->customer_name             =   $request->name; 
        $contact->customer_payment_email    =   $request->payment_email_address; 
        $contact->skype                     =   $request->im; 
        $contact->whatsapp                  =   $request->whatsapp; 
        $contact->note                      =   $request->notes;         
        $save=$contact->save();

        if($save)
        {
            return redirect('/contacts')->with('success','New User has been successfuly added to database');            
        }else
        {
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function delete_contact($id = null)
    {
        $contact = contact::find($id);
        $contact->delete();
        $projects = projects::where('cust_id','=',$id);
        $projects->delete();
        $transactions = transactions::where('cust_id','=',$id);
        $transactions->delete();

        return redirect('/contacts');
    }
}
