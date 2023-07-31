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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("customer_id")->unique();
            $table->string("order_name")->nullable();
            $table->decimal("order_amt",10,2)->default(0.00);
            $table->tinyInteger("order_status")->comment(
            "1->pending,2->approved,3->delivered,4->closed")->default(1);
            $table->tinyInteger("status")
            ->comment("1->active,2->inactive,3->deleted")->default(1);
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
