<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\projects;
use App\Models\contact; 
use App\Models\transactions;

class projectscontroller extends Controller
{
    protected function index()
    {
        ///$projects = projects::paginate(10);
       // return view('projects', ['projects' => $projects]);  
        
        $projects = DB::table('tblproject as project')
        ->join('tblcontact as contact','contact.id', '=', 'project.cust_id')
        ->select('project.*','contact.customer_name as customer_name')        
        ->paginate(10);
         return view('projects', ['projects' => $projects]);  

        
        
    }
    
 
    protected function projects_transactions($id=null)
    {
        $projects = projects::where('id','=',$id)->first();
        $transactions = transactions::where('cust_id','=',$id)->paginate(10);
        return view('project-transactions', ['transactions' => $transactions,'projects'=>$projects]);
        
    }

    protected function add_project()
    {
        $contacts = contact::all(); 
        return view('add_project',['contacts'=>$contacts]);   
    }

    protected function save_project(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'contact' => 'required',
            'project_name' => 'required',
            'project_url' => 'required'
        ]);  
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $project = new projects;
        $project->cust_id                   =   $request->contact; 
        $project->project_name              =   $request->project_name; 
        $project->project_url               =   $request->project_url; 
        $project->note                      =   $request->notes;         
        $save=$project->save();

        if($save){
            //return back()->with('success','New User has been successfuly added to database');
            return redirect('/projects')->with('success','New User has been successfuly added to database');

        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function edit_project($id = null)
    {
        $contacts = contact::all(); 
        $project = projects::all()->where('id',$id)->first();
        return view('edit_project', ['project' => $project, 'contacts'=>$contacts]);
    }

    protected function update_project(Request $request, $id)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'contact' => 'required',
            'project_name' => 'required',
            'project_url' => 'required'           
        ]); 
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $project = projects::find($id);
        $project->cust_id                   =   $request->contact; 
        $project->project_name              =   $request->project_name; 
        $project->project_url               =   $request->project_url; 
        $project->note                      =   $request->notes;         
        $save=$project->save();

        if($save)
        {
            return redirect('/projects')->with('success','New User has been successfuly added to database');            
        }else
        {
            return back()->with('fail','Something went wrong, try again later');
        }
    }

    public function delete_project($id = null)
    {
        $project = projects::find($id);
        $project->delete();
        return redirect('/projects');
    }

}
