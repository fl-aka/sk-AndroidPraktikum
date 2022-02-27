<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinasiResource;
use App\Models\Destinasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DestinasiControllerApi extends Controller
{
    public function destinasi()
    {
        $destinasi = destinasi::all();
        return DestinasiResource::collection($destinasi);
    }

    public function destinasiDetail(destinasi $destinasi)
    {
        $detail = destinasi::where('id', $destinasi->id)->first();
        return new DestinasiResource($detail);
    }

    public function destinasiKategori(Kategori $kategori)
    {
        $destinasi = destinasi::where('kategori_id', $kategori->id)->get();
        return DestinasiResource::collection($destinasi);
    }
}
