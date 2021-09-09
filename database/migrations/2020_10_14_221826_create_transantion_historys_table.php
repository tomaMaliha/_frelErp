<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransantionHistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transantion_historys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_id')->nullable();
            $table->date('date');
            $table->integer('distributor_id');
            $table->string('mobile')->nullable();
            $table->string('bank_name');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('ref_no')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('attachment')->nullable();
            $table->text('remarks')->nullable();
            $table->string('division')->nullable();
            $table->string('zone')->nullable();
            $table->string('base')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('transantion_historys');
    }
}
