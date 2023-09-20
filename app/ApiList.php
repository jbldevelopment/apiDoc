<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiList extends Model
{
    use HasFactory;

    protected $table = 'api_lists';
    protected $primaryKey = 'api_id';
    protected $fillable = [
        'api_id',
        'api_title',
        'api_descripetion',
        'api_type',
        'api_order',
        'api_category',
        'api_link',
        'api_status'
    ];
}
