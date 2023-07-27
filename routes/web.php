<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::group(['prefix'=>"admin"],function(){

    Route::get('/test/{id}',[SiteController::class,'getid']);
      Route::get('/test2',function(){
        return redirect()->route('appurl');
        });
        
        Route::get('/test3',function(){
          $environment = App::environment();
        return $environment;
        })->name('appurl');

});




