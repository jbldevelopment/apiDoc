<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    use HasFactory;
    protected $table = 'technologies';
    protected $primaryKey = 'technology_id';
    protected $fillable = [
        'technology_id',
        'technology_name',
        'technology_slug',
        'technology_order',
        'technology_status',
    ];
}
