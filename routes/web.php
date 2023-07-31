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

//  $user = DB::table('orders')->orderBy('id')->chunk('15',function($orders){
  
//  });
//  dd($user);
// echo"<pre>"; print_r($user); exit;

// $insert = DB::table('testtable')->insert([
// "test_name"=>"nithish",
// "test_email"=>"nithish@gmail.com",
// "test_city"=>"salem",
// "test_salary"=>5000,
// "test_datetime"=> date("Y-m-d H:i:s")
// ]);

// $insert = DB::table('orders_products')->insert([
//   "order_id"=>4,
//   "product_name"=>"product_five",
//   "product_price"=>1450,
//   ]);

/**
 * count function
 */
// $count = DB::table('test')->count();
// $max = DB::table('test')->sum('test_salary');

// if(DB::table('test')->where("test_name","sam")->doesntExist()){
//   dd("yes");
// }else{
//   return "no";
// }

/**
 * select specific element
 */

//  $select = DB::table('test')->select("test_name as name","test_email as email")->get();
// $query = DB::table('test')->select("test_name as name");
// $select = $query->addSelect("test_email as email")->get();
// $select = DB::table('test')->select(DB::raw("test_name as name,sum(test_salary) as total_salary,avg(test_salary) as average_salary"))->groupBy("test_name")->get();


// $join = DB::table('test_table')->join(
//   "orders","test_table.id","=","orders.customer_id"
//   )->Join("orders_products","orders.id","=","orders_products.order_id")
//   ->select("test_table.*","orders.*","orders_products.*")->get();

  // $query = DB::table('orders')->whereNot(function($qa){
  //   $qa->where("orders.customer_id","1")->orWhere("orders.customer_id","7");
  // })->get();

  // $query = DB::table("orders")->select(DB::raw("customer_id,sum(order_amt) as total_amt"))->having("customer_id","<",5)->groupBy('customer_id')->get();

    // $join = DB::table('test_table')->joinSub($query,"orders",function($join){
    //   $join->on("test_table.id","=","orders.customer_id");
    // })->get();

    // $update = DB::table('orders')->where("order_name","ni_order")->update(['order_amt'=>3333]);
  //  $update = DB::table('orders')->decrement('order_amt',4,['customer_id'=>1]);
  // $delete = DB::table('orders')->where("order_amt",600)->delete();
  // $data = DB::table('orders')->where('order_amt', '>', 1000)->dumpRawSql();
  

  
  




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
