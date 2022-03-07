<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\maincontroller;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\projectscontroller;
use App\Http\Controllers\transactionscontroller;
use App\Http\Controllers\siteusercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['usercheck']], function(){

Route::get('/',[maincontroller::class,'index']); 

Route::get('/users',[siteusercontroller::class,'index']); 
Route::get('/users/{id}',[projectscontroller::class,'user_projects']); 

Route::get('/add_user',[siteusercontroller::class,'add_user']); 
Route::post('/save_user',[siteusercontroller::class,'save_user']);
Route::get('/edit_user/{id}',[siteusercontroller::class,'edit_user']); 
Route::post('/update_user/{id}',[siteusercontroller::class,'update_user']);
Route::get('/deluser/{id}',[siteusercontroller::class,'delete_user']); 

Route::get('/contacts',[contactcontroller::class,'index']);
Route::get('/contacts/projects/{id}',[contactcontroller::class,'contact_projects']);
Route::get('/contacts/transactions/{id}',[contactcontroller::class,'contact_transactions']);

Route::get('/add_contact',[contactcontroller::class,'add_contact']); 
Route::post('/save_contact',[contactcontroller::class,'save_contact']);
Route::get('/edit_contact/{id}',[contactcontroller::class,'edit_contact']); 
Route::post('/update_contact/{id}',[contactcontroller::class,'update_contact']);
Route::get('/delcontact/{id}',[contactcontroller::class,'delete_contact']); 

Route::get('/projects',[projectscontroller::class,'index']); 
Route::get('/projects/transactions/{id}',[projectscontroller::class,'projects_transactions']);

Route::get('/add_project',[projectscontroller::class,'add_project']); 
Route::post('/save_project',[projectscontroller::class,'save_project']);
Route::get('/edit_project/{id}',[projectscontroller::class,'edit_project']); 
Route::post('/update_project/{id}',[projectscontroller::class,'update_project']);
Route::get('/delproject/{id}',[projectscontroller::class,'delete_project']); 

Route::get('/transactions',[transactionscontroller::class,'index']); 
Route::get('/add_transaction',[transactionscontroller::class,'add_transaction']); 
Route::post('/save_transaction',[transactionscontroller::class,'save_transaction']);
Route::get('/edit_transaction/{id}',[transactionscontroller::class,'edit_transaction']); 
Route::post('/update_transaction/{id}',[transactionscontroller::class,'update_transaction']);
Route::get('/deltransaction/{id}',[transactionscontroller::class,'delete_transaction']); 

Route::get('/logout',[maincontroller::class,'logout']);
}); 

Route::get('/login',[maincontroller::class,'login']); 
Route::post('/action',[maincontroller::class,'login_action']); 
 
