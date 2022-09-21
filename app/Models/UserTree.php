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
}
