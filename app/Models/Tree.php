<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;

    protected $table = "trees";

    protected $fillable = [
        'type_id',
        'code',
        'description',
        'planting_date',
        'image',
        'latitude',
        'longitude',
    ];

    protected $visible = [
        'id',
        'type_id',
        'code',
        'description',
        'planting_date',
        'image',
        'latitude',
        'longitude',
    ];
}
