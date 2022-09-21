<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCalculate extends Model
{
    use HasFactory;

    protected $table = "user_calculates";

    protected $fillable = [
        'user_id',
        'measurement_date',
        'measurement_data',
        'result',
    ];

    protected $visible = [
        'id',
        'user_id',
        'measurement_date',
        'measurement_data',
        'result',
    ];

    protected $casts = [
        'measurement_data' => Json::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
