<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct() {

    }

    public function getLocation(Request $request){
        $provinceId = $request->input('province_id');
        return response()->json([
            'province_id' => $request->province_id,
        ]);
    }
}
