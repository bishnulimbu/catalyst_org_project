<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'dao_registration_number',
        'established_date',
        'swc_affiliation_number',
        'pan_number',
        'founding_members',
        'total_members',
    ];
}