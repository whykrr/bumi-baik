<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $keyType = "string";

    protected $fillable = [
        'id',
        'payment_transaction_id',
        'order_code',
        'user_id',
        'date',
        'tree_type_id',
        'planting_id',
        'total',
        'voucher_id',
        'voucher_code',
        'voucher_value',
        'grand_total',
        'payment_method',
        'payment_detail',
        'status',
    ];

    protected $with = ['user', 'voucher'];

    protected $visible = [
        'id',
        'payment_transaction_id',
        'order_code',
        'user_id',
        'date',
        'tree_type_id',
        'planting_id',
        'total',
        'voucher_id',
        'voucher_code',
        'voucher_value',
        'grand_total',
        'payment_method',
        'payment_detail',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function tree_type()
    {
        return $this->belongsTo(TreeType::class, 'tree_type_id');
    }

    public function planting()
    {
        return $this->belongsTo(Planting::class);
    }
}
