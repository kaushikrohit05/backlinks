<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\projects;
use App\Models\transactions;
use App\Models\contact; 

class transactionscontroller extends Controller
{
    protected function index()
    {
        //$transactions = transactions::paginate(10);
        //return view('transactions', ['transactions' => $transactions]);   


        // $transactions = transactions::join('tblcontact as contact','contact.id', '=', 'ads.category_id')
        
         $transactions = DB::table('tbltransaction as transactions')
        ->join('tblcontact as contact','contact.id', '=', 'transactions.cust_id')
        ->join('tblproject as project','project.id', '=', 'transactions.cust_id') 
        ->select('transactions.*','contact.customer_name as customer_name','project.project_name as project_name')        
        ->paginate(10);
         return view('transactions', ['transactions' => $transactions]);  


    }

    protected function add_transaction()
    {
        $contacts = contact::all(); 
        $projects = projects::all();
        return view('add_transaction',['contacts'=>$contacts, 'projects'=>$projects]);   
    }

    protected function save_transaction(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'contact' => 'required',
            'project' => 'required',
            'transaction_date' => 'required',
            'expiry_date' => 'required',
            'price' => 'required',
        ]);  
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $transaction = new transactions;
        $transaction->cust_id                       =   $request->contact; 
        $transaction->proj_id                       =   $request->project; 
        $transaction->transaction_date              =   $request->transaction_date; 
        $transaction->transaction_expire_date       =   $request->expiry_date; 
        $transaction->price                         =   $request->price; 
        $transaction->note                          =   $request->notes;         
        $save=$transaction->save();

        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('/transactions')->with('success','New User has been successfuly added to database');

        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function edit_transaction($id = null)
    {
        $contacts = contact::all(); 
        $projects = projects::all();
        $transaction = transactions::all()->where('id',$id)->first();
        return view('edit_transaction', ['transaction' => $transaction, 'contacts'=>$contacts, 'projects'=>$projects]);
    }

    protected function update_transaction(Request $request, $id)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'contact' => 'required',
            'project' => 'required',
            'transaction_date' => 'required',
            'expiry_date' => 'required',
            'price' => 'required',         
        ]); 
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $transaction = transactions::find($id);
        $transaction->cust_id                       =   $request->contact; 
        $transaction->proj_id                       =   $request->project; 
        $transaction->transaction_date              =   $request->transaction_date; 
        $transaction->transaction_expire_date       =   $request->expiry_date; 
        $transaction->price                         =   $request->price; 
        $transaction->note                          =   $request->notes;          
        $save=$transaction->save();

        if($save)
        {
            return redirect('/transactions')->with('success','New User has been successfuly added to database');            
        }else
        {
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function delete_transaction($id = null)
    {
        $transaction = transactions::find($id);
        $transaction->delete();
        return redirect('/transactions');
    }
}
