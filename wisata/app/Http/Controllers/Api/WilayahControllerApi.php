<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WilayahResource;
use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahControllerApi extends Controller
{
    public function wilayah()
    {
        $wilayah = Wilayah::all();
        return WilayahResource::collection($wilayah);
    }
}
