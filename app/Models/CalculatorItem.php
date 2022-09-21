<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatorItem extends Model
{
    use HasFactory;
    protected $table = "calculator_items";

    protected $fillable = [
        'type',
        'name',
        'price_per_unit',
        'carbon_offset',
    ];

    protected $visible = [
        'id',
        'type',
        'name',
    ];
}
