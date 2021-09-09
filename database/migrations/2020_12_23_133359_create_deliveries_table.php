<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('distributor_id')->nullable();
            $table->integer('DO')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('value')->nullable();
            $table->integer('ctn')->nullable();
            $table->integer('ctn_serial')->nullable();
            $table->string('remarks')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->default(0);
            $table->integer('pending_order')->default(0);

            $table->string('driver_name')->default(1);
            $table->string('driver_mobile')->default(1);
            $table->string('destination')->nullable();
            $table->string('vehical')->nullable();
            $table->string('transport')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}
