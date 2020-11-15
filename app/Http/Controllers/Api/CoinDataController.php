<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CoinData;
use Illuminate\Http\Request;

class CoinDataController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'coin_symbol' => 'string',
            'from_date' => 'date',
        ]);

        $coins = CoinData::select();

        if (isset($validated['from_date'])) {
            $coins->where('created_at', '>=', $validated['from_date']);
        }

        if (isset($validated['coin_symbol'])) {
            $coins->where('symbol', '=', strtoupper($validated['coin_symbol']));
        }

        return $coins->paginate();
    }

    public function show(CoinData $coinData)
    {
        return $coinData;
    }

    public function latest(Request $request)
    {
        $validated = $request->validate([
            'coin_symbol' => 'string',
        ]);

        $coins = CoinData::select();

        if (isset($validated['coin_symbol'])) {
            $coins->where('symbol', '=', strtoupper($validated['coin_symbol']));
        }

        return $coins->latest()->first();
    }
}
