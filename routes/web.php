<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    /**
     * select all users from user table 
     */
     
//   $user = DB::select("select * from users");

/**
 * create user table
 */

//  $user = DB::insert('insert into users(name,email,password) values(?,?,?)',
//      ["suriya","suriya@gmail.com","12345678"]);

/**
 * update user table
 */

//  $user = DB::update("update users set name=?,email=? where id=1",['suriya123'
//         ,"suriya123@gmail.com"]);

/**
 * delete user table
 */

    // $user = DB::delete(
    //     'delete from users where email=?',
    //     ['suriya123@gmail.com']
    // );


 /**
  * querybuilder get all data
  */   
  $users = DB::table("users")->get();

/**
 * querybuilder get first record
 */
//  $user = DB::table('users')->where("name","suriya")->first();

 /**
  * querybuilder get  record with particular value
  */
//   $user = DB::table('users')->where("name","suriya")->value("email");

  /**
   * querybuilder find with id
   */
//  $user = DB::table('users')->find(4);

 /**
  * pluck method
  */

//   $user = DB::table('users')->pluck('email','name');


/**
 * chunck method
 */

 $user = DB::table('orders')->orderBy('id')->chunk('15',function($orders){
   dd($orders);
 });

// echo"<pre>"; print_r($user); exit;


   dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');
});

require __DIR__.'/auth.php';
