<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCodeMeta extends Model
{
    use HasFactory;
    protected $table = 'api_code_metas';
    protected $primaryKey = 'api_code_id';
    protected $fillable = [
        'api_code_id',
        'api_meta_id',
        'api_code_title',
        'api_code_slug',
        'api_code',
        'api_technology',
        'api_code_order',
        'api_code_status',
    ];
}
