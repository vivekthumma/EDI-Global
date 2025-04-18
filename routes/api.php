<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DefaltController;
use App\Http\Controllers\api\Authentication;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/////////////////////////////Register / Login ////////////////
Route::post('UserRegister',[Authentication::class,'userregi']); 
Route::post('userlogin',[Authentication::class,'userlog']); 
Route::post('checkotp',[Authentication::class,'checkotp']); 
Route::post('changepassword',[Authentication::class,'changepassword']); 
Route::post('userforgetpassword',[Authentication::class,'userforgetpassword']); 
Route::post('userstatuscheck',[Authentication::class,'userstatuscheck']); 
Route::post('updateprofile',[Authentication::class,'updateprofile']); 


Route::post('getslider',[DefaltController::class,'getslider']);
Route::post('getpopup',[DefaltController::class,'getpopup']);
Route::post('gethomepage',[DefaltController::class,'gethomepage']);
Route::post('getsubcategory',[DefaltController::class,'getsubcategory']);
Route::post('getsubcatproduct',[DefaltController::class,'getsubcatproduct']);
Route::post('getproductimage',[DefaltController::class,'getproductimage']);
Route::post('getcoupan',[DefaltController::class,'getcoupan']);
Route::post('getmainorders',[DefaltController::class,'getmainorders']);
Route::post('getorders',[DefaltController::class,'getorders']);
