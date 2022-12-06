<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCarbonOffset extends Model
{
    use HasFactory;
    protected $table = "user_carbon_offsets";

    protected $fillable = [
        'user_id',
        'transaction_id',
        'offset_date',
        'total_offset',
    ];

    protected $visible = [
        'id',
        'user_id',
        'transaction_id',
        'offset_date',
        'total_offset',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function record($transaction)
    {
        $basic_price = 200000;
        $basic_offset = 1000;

        $data = [
            'user_id' => $transaction['user_id'],
            'transaction_id' => $transaction['id'],
            'offset_date' => $transaction['date'],
            'total_offset' => ($transaction['total'] / $basic_price) * $basic_offset
        ];

        return self::create($data);
    }
}
