<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            // $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('restricted');
            $table->integer('brand_id')->nullable();
            $table->string('name');
            $table->string('distributor_price')->nullable();
            $table->string('trade_price')->nullable();
            $table->string('corporate_price')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->string('unique_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
