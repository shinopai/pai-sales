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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('membership_number')->unsigned()->comment('会員番号');
            $table->string('name')->comment('名前');
            $table->enum('sex', ['男', '女'])->comment('性別');
            $table->integer('birth_year')->unsigned()->comment('誕生年');
            $table->integer('birth_month')->unsigned()->comment('誕生月');
            $table->integer('birth_day')->unsigned()->comment('誕生日');
            $table->integer('zip')->unsigned()->comment('郵便番号');
            $table->string('address')->comment('住所');
            $table->string('tel')->comment('電話番号');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
