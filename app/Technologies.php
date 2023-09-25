<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    protected $primaryKey = 'technolgy_id';
    protected $fillable = [
        'technolgy_id',
        'technolgy_name',
        'technolgy_slug',
        'technolgy_order',
        'technolgy_status',
    ];
}
