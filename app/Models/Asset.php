<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'as_number',
        'dns',
        'organization_id',
        'sensor_id',
        'pic_id',
        'description'
    ];
}
