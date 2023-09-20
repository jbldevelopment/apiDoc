<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCategory extends Model
{
    use HasFactory;
    protected $table = 'api_categories';
    protected $primaryKey = 'api_category_id';
    protected $fillable = [
        'api_category_id',
        'api_category_title',
        'api_category_slug',
        'api_category_descripetion',
        'api_category_order',
        'api_category_status'
    ];
}
