<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorMullayonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributor_mullayons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business_details')->nullable();
            $table->string('business_place')->nullable();
            $table->string('godown_size')->nullable();
            $table->string('delivery_vehical')->nullable();
            $table->string('mechanical_details')->nullable();
            $table->string('nonMechanical_details')->nullable();
            $table->string('is_office')->nullable();
            $table->string('business_money_amount')->nullable();
            $table->string('business_own_money')->nullable();
            $table->string('business_bank_money')->nullable();
            $table->string('electric_business_experience')->nullable();
            $table->string('other_business_experience')->nullable();
            $table->string('ownership_type')->nullable();

            $table->string('partnership_distibutor_name')->nullable();
            $table->string('partnership_distibutor_address')->nullable();
            $table->string('partnership_distibutor_percentage')->nullable();
            $table->string('before_electrical_distributorship_name')->nullable();
            $table->string('before_electrical_distributorship_duration')->nullable();

            $table->string('probability_business_duration_withFirstrays')->nullable();

            $table->string('partnership_distibutor_representative_name')->nullable();
            $table->string('partnership_distibutor_representative_address')->nullable();
            $table->string('partnership_distibutor_representative_mobile')->nullable();

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
        Schema::dropIfExists('distributor_mullayons');
    }
}
