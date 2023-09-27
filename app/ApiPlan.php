<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiPlan extends Model
{
    use HasFactory;
    protected $table = 'api_plans';
    protected $primaryKey = 'api_plan_id';
    protected $fillable = [
        'api_plan_id',
        'api_id',
        'api_plan_title',
        'api_plan_descripetion',
        'api_plan_regular_price',
        'api_plan_discounted_price',
        'api_discounted_off_text',
        'api_monthly_duration',
        'api_plane_status'
    ];
}
