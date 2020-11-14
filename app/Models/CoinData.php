<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinData extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'name',
        'price_usd',
        'raw_data',
    ];
}
