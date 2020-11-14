<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generate(Request $request)
    {
        $rawToken = Str::random(60);

        Auth::user()->forceFill([
            'api_token' => hash('sha256', $rawToken),
            'api_token_preview' => substr($rawToken, 0, 20),
        ])->save();

        Log::info('api_token: User generate new API token!',  ['user_id' => Auth::user()->id]);

        $request->session()->flash('raw.api.token', $rawToken);

        return redirect()->route('home');
    }
}
