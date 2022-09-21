<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = "vouchers";

    protected $fillable = [
        'code',
        'type',
        'tree_id',
        'planting_id',
        'description',
        'terms',
        'value',
        'qty_tree',
        'quota',
    ];

    protected $with = ['tree', 'planting'];
    protected $appends = ['trees', 'product'];

    protected $visible = [
        'id',
        'code',
        'type',
        'trees',
        'description',
        'value',
        "product",
    ];

    public function tree()
    {
        return $this->belongsTo(TreeType::class, 'tree_id');
    }

    public function planting()
    {
        return $this->belongsTo(Planting::class);
    }

    public function getTreesAttribute()
    {
        if ($this->planting_id != null) {
            return null;
        }
        return [
            'id' => $this->tree_id,
            'name' => $this->tree->name,
            'description' => $this->tree->description,
            'location_name' => $this->tree->partner->name,
        ];
    }

    public function getProductAttribute()
    {
        if ($this->planting_id == null) {
            return null;
        }
        return [
            'id' => $this->planting->id,
            'name' => $this->planting->name,
            'description' => $this->planting->description,
            'location_name' => $this->planting->partner->name,
            'tree' =>
            [
                'id' => $this->planting->tree_type->id,
                'name' => $this->planting->tree_type->name,
                'description' => $this->planting->tree_type->description,
            ],
            'planting_date' => $this->planting->planting_date,
            'qty' => $this->qty_tree,
        ];
    }
}
