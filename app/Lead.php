<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'leads';
    protected $primaryKey = 'lead_id';
    protected $fillable = [
        'lead_id',
        'lead_user_id',
        'lead_name',
        'lead_email',
        'lead_mobile',
        'lead_occupation',
        'lead_otp',
        'lead_verified',
        'lead_status',
    ];
}
