<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->dateTime('sales_date')->comment('売上日');
            $table->integer('quantity')->unsigned()->comment('個数');
            $table->timestamps();


            $table->foreignId('customer_id')
                              ->constrained()
                              ->onDelete('cascade');
            $table->foreignId('store_id')
                              ->constrained()
                              ->onDelete('cascade');
            $table->foreignId('item_id')
                              ->constrained()
                              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};
