<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', function (){
//     return view('home.index');
// });
   

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//route file to save next of personal record
Route::post('/save-info', [App\Http\Controllers\LogicController::class, 'personal_Info'])->name('save.info');
//route file to save next of kin record
Route::post('/next_of_kin', [App\Http\Controllers\LogicController::class, 'next_of_kin'])->name('next_of_kin');

Route::post('/add_skill', [App\Http\Controllers\LogicController::class, 'add_skill'])->name('add_skill');
Route::post('/profession_related_skill', [App\Http\Controllers\LogicController::class, 'profession_related_skill'])->name('profession_related_skill');


//route file for updating a table with user_id 
Route::put('/edit-info/{id}', [App\Http\Controllers\LogicController::class, 'edit_personal_Info'])->name('edit.info');
Route::put('/nextofKin/{id}', [App\Http\Controllers\LogicController::class, 'edit_nextofKin'])->name('nextofKin');
Route::delete('/deleteMember/{id}', [App\Http\Controllers\LogicController::class, 'deleteMember'])->name('deleteMember');

Route::post('/posting', [App\Http\Controllers\LogicController::class, 'postMember'])->name('posting');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/unit_members', [App\Http\Controllers\HomeController::class, 'unit_members'])->name('unit_members');
Route::get('/probation', [App\Http\Controllers\HomeController::class, 'probation'])->name('probation');
Route::get('/probation', [App\Http\Controllers\HomeController::class, 'probation'])->name('probation');
Route::get('/cable_network', [App\Http\Controllers\HomeController::class, 'cable_network'])->name('cable_network');
Route::get('/camera', [App\Http\Controllers\HomeController::class, 'camera'])->name('camera');
Route::get('/console', [App\Http\Controllers\HomeController::class, 'console'])->name('console');
Route::get('/production_sales', [App\Http\Controllers\HomeController::class, 'production_sales'])->name('production_sales');
Route::get('/posting', [App\Http\Controllers\HomeController::class, 'posting'])->name('posting');
Route::get('/add_member', [App\Http\Controllers\HomeController::class, 'add_member'])->name('add_member');
// Route file for fetching user or member record to the form before updating it on the table
Route::get('/editmember/{id}', [App\Http\Controllers\HomeController::class, 'edit_member'])->name('edit_member');
// Route::get('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members');