<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Citizen extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'famName',
        'address',
        'phone_number',
        'monthly_income',
        'marital_status',
        'healthy_disabilty_prevent_work',
        'underage_children',
        'sponsored_chronic_illness',
        'wife_chronic_conditions',
        'husband_chronic_conditions',
        'fragile_houssing',
        'live_familyHome',
        'has_debt',
        'in_municipality',
        'rented_house',
        'frameworks',
        'negatives'
    ];
    protected $casts = [
        'frameworks' => 'array',
        'negatives'=>'array'
    ];
    

    protected $dates = ['deleted_at'];
}
