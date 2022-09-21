<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeType extends Model
{
    use HasFactory;

    protected $table = "tree_types";

    protected $fillable = [
        'partner_id',
        'name',
        'description',
        'sequestration',
    ];

    protected $with = ['partner'];

    protected $visible = [
        'id',
        'name',
        'description',
        'partner'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
