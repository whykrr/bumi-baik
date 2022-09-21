<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planting extends Model
{
    use HasFactory;

    protected $table = "plantings";

    protected $fillable = [
        'name',
        'partner_id',
        'tree_type_id',
        'description',
        'planting_date',
        'image',
    ];

    protected $with = ['partner', 'tree_type'];

    protected $visible = [
        'id',
        'name',
        'partner_id',
        'tree_type_id',
        'description',
        'planting_date',
        'image',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function tree_type()
    {
        return $this->belongsTo(TreeType::class, 'tree_type_id');
    }
}
