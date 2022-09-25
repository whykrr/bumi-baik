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

    protected $with = ['type'];

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

    // cast 
    protected $casts = [
        'planting_date' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function type()
    {
        return $this->belongsTo(TreeType::class, 'type_id');
    }
}
