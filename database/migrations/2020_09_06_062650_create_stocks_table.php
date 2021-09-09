<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('product_id');
            $table->date('date')->nullable();
            $table->string('note')->nullable();
            $table->string('opening')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('alert_quantity')->nullable();
            $table->integer('pending_order')->default(0);
            $table->string('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
