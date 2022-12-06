<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function findTree($offset)
    {
        $userTrees = [];

        $tenYearAgo = date('Y-m-d', strtotime('-10 year'));

        $getTree = self::select(['trees.*', 'tree_types.name AS tree_type_name', 'tree_types.sequestration', DB::raw('COUNT(user_trees.user_tree_sequestration) as user_sequastration'), DB::raw('IF( ISNULL(SUM( user_trees.user_tree_sequestration )),tree_types.sequestration,tree_types.sequestration - SUM( user_trees.user_tree_sequestration )) as remaining_sequastration')])
            ->join('tree_types', 'tree_types.id', '=', 'trees.type_id')
            ->join('user_trees', 'user_trees.id', '=', 'trees.id', 'left')
            ->where('trees.planting_date', '<=', $tenYearAgo)
            ->groupBy('trees.id')
            ->orderBy('trees.id', 'ASC')
            ->having('remaining_sequastration', '>=', $offset)
            ->limit(1)
            ->get();

        foreach ($getTree as $tree) {
            $userTrees[] = [
                'tree_id' => $tree->id,
                'code' => $tree->code,
                'user_tree_sequestration' => $offset,
            ];
        }

        return $userTrees;
    }
}
