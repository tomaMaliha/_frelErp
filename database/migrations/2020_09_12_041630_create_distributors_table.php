<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('distributor_name')->nullable();
            $table->string('proprietor_name')->nullable();
            $table->string('fat_hus_name')->nullable();
            $table->string('proprietor_present_address')->nullable();
            $table->string('proprietor_present_PO')->nullable();
            $table->string('proprietor_present_thana')->nullable();
            $table->string('proprietor_present_district')->nullable();
            $table->string('proprietor_permanent_address')->nullable();
            $table->string('proprietor_permanent_PO')->nullable();
            $table->string('proprietor_permanent_thana')->nullable();
            $table->string('proprietor_permanent_district')->nullable();

            $table->string('telephone_office')->nullable();
            $table->string('telephone_house')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobileALT')->nullable();
            $table->string('fax')->nullable();
            $table->string('zone')->nullable();
            $table->string('division')->nullable();
            $table->string('base')->nullable();
            $table->decimal('credit_limit')->default(0);

            $table->string('image_distributot')->nullable();
            $table->string('image_nominee')->nullable();
            $table->string('image_trade')->nullable();
            $table->string('image_nid')->nullable();
            $table->string('image_form')->nullable();
            $table->unsignedTinyInteger('active')->comment('0 = pending, 1 = pending1, 2 = pending2, 3 = confirm');
            $table->string('random_number')->nullable();
            $table->string('comment')->nullable();
            $table->string('user_id')->nullable();
            $table->decimal('distributor_payment')->nullable();
            $table->decimal('total_money')->nullable();
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
        Schema::dropIfExists('distributors');
    }
}
