<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiMeta extends Model
{
    use HasFactory;
    protected $table = 'api_metas';
    protected $primaryKey = 'api_meta_id';
    protected $fillable = [
        'api_meta_id',
        'api_id',
        'api_meta_version',
        'api_meta_title',
        'api_meta_slug',
        'api_meta_descripetion',
        'api_meta_order',
        'api_meta_link',
        'api_meta_status'
    ];
}
