<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributor_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('distributor_id')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->decimal('credit_limit')->nullable();
            $table->decimal('eligible_balance')->nullable();
            $table->decimal('hold_balance')->nullable();
            $table->decimal('cart_value')->nullable();
            $table->decimal('balance')->nullable();
            $table->decimal('sales')->nullable();
            $table->decimal('collection')->nullable();
            $table->decimal('opening_balance')->nullable();
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
        Schema::dropIfExists('distributor_balances');
    }
}
