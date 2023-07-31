<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    

     public function up()
     {
         Schema::table('orders', function (Blueprint $table) {
             // Remove the unique constraint on the customer_id column
 
             // Change the data type of the customer_id column to match the foreign key
             $table->unsignedBigInteger('customer_id')->change();
 
             // Add the foreign key constraint to the customer_id column
             $table->foreign('customer_id')->references('id')->on('test_table');
         });
     }


    /**
     * Reverse the migrations.
     */
    
     public function down()
     {
         Schema::table('orders', function (Blueprint $table) {
             // Drop the foreign key constraint from the customer_id column
             $table->dropForeign(['customer_id']);
 
             // Change the data type of the customer_id column back to its original type
             $table->integer('customer_id')->change();
 
         });
     }


};
