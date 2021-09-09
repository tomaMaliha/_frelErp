<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributorMullayon extends Model
{
    protected $fillable = [
        'business_details',
        'business_place',
        'godown_size',
        'delivery_vehical',
        'mechanical_details',
        'nonMechanical_details',
        'is_office',
        'business_money_amount',
        'business_own_money',
        'business_bank_money',
        'electric_business_experience',
        'other_business_experience',
        'ownership_type',
        'partnership_distibutor_name',
        'partnership_distibutor_address',
        'partnership_distibutor_percentage',
        'before_electrical_distributorship_name',
        'before_electrical_distributorship_duration',
        'probability_business_duration_withFirstrays',
        'partnership_distibutor_representative_name',
        'partnership_distibutor_representative_address',
        'partnership_distibutor_representative_mobile',
    ];
}
