<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('info')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('time_public')->nullable();
        });

        Schema::create('virtual_money', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->float('buy')->nullable();
            $table->float('sell')->nullable();
        });

        Schema::create('trading_usd', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->float('exchange_rate')->nullable();
        });

        Schema::create('trading_vnd', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->float('exchange_rate')->nullable();
        });

        Schema::create('agency', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
