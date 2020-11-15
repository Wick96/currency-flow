<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GlobalData;

class GlobalDataController extends Controller
{
    public function index()
    {
        return GlobalData::paginate();
    }

    public function show(GlobalData $globalData)
    {
        return $globalData;
    }

    public function latest()
    {
        return GlobalData::latest()->first();
    }
}
