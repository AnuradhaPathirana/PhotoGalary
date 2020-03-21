<?php

use Illuminate\Support\Facades\Route;
use App\img;
use App\discrip;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    $data=App\img::all();
    return view('home')->with('dataimg',$data);
     
});


Route::post('/upload','store@storeImg'); ///To store Data


Route::get('/read/{id}','store@readImg');//To read Data


// Route::get('/update/{id}','store@update');//To update Data

Route::get('/delete/{id}','store@deleteImg');//To delete Data


Route::get('/update/{id}',function($id){
    $findtb1 = img::find($id);
    $findtb2 = discrip::find($id);
    return view('update')->with('upd1',$findtb1)
        
        ->with('upd2',$findtb2);

});

Route::POST('/update','store@update');