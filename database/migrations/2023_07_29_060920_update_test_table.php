<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('test', function (Blueprint $table) {
            $table->string("test_name")->unique()->nullable(false)->change();
            $table->string("test_email")->unique()->nullable(false)->default(null)->change();
            $table->string("test_city")->nullable(); 
            $table->double("test_salary",10,2)->default(0.00); 
            $table->dateTime("test_datetime")->nullable(); 
              
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test', function (Blueprint $table) {
            $table->string("test_name")->nullable()->change();
            $table->string("test_email")->nullable()->default("abc")->change();
            $table->dropUnique("test_test_name_unique");
            $table->dropUnique("test_test_email_unique");
            $table->dropColumn('test_city');
            $table->dropColumn('test_salary');
            $table->dropColumn('test_datetime');
        });
    }
};
