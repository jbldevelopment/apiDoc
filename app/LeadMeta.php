<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadMeta extends Model
{
    use HasFactory;
    protected $table = 'lead_metas';
    protected $primaryKey = 'lead_meta_id';
    protected $fillable = [
        'lead_meta_id',
        'lead_id',
        'lead_intrest',
        'lead_attchment',
        'lead_status',
    ];
}
