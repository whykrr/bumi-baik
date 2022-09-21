<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = "partners";

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'latitude',
        'longitude',
        'is_active',
        'is_verified',
    ];

    protected $visible = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'latitude',
        'longitude',
        'is_active',
        'is_verified',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
    ];
}
