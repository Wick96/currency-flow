<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'coins_count',
        'active_markets',
        'btc_d',
        'eth_d',
        'raw_data',
    ];
}
