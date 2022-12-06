<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTree extends Model
{
    use HasFactory;

    protected $table = "user_trees";

    protected $fillable = [
        'user_id',
        'tree_id',
        'transaction_id',
        'date_adopted',
        'user_tree_sequestration',
    ];

    protected $with = ['user', 'tree'];

    protected $visible = [
        'id',
        'user_id',
        'tree_id',
        'transaction_id',
        'date_adopted',
        'user_tree_sequestration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tree()
    {
        return $this->belongsTo(Tree::class);
    }

    public static function adopt($user_offset)
    {
        $find_tree = Tree::findTree($user_offset['total_offset']);
        $userTrees = [];

        foreach ($find_tree as $ft) {
            $userTrees = [
                'user_id' => $user_offset['user_id'],
                'tree_id' => $ft['tree_id'],
                'transaction_id' => $user_offset['transaction_id'],
                'date_adopted' => $user_offset['offset_date'],
                'user_tree_sequestration' => $ft['user_tree_sequestration'],
            ];
        }

        return UserTree::create($userTrees);
    }
}
