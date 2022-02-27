<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Destinasi;
use App\models\kategori;
use App\models\wilayah;
use storage;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinasi = destinasi::all();
        return view('wisata.index', compact('destinasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $wilayah = wilayah::all();
        return view('wisata.tambah', compact('kategori', 'wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_id' => 'not_in:0',
            'wilayah_id' => 'not_in:0',
            'nama' => 'required',
            'konten' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $images = $request->file('photo')->store('content');
        Destinasi::create([
            'kategori_id' => $request->kategori_id,
            'wilayah_id' => $request->wilayah_id,
            'nama' => $request->nama,
            'konten' => $request->konten,
            'photo' => $images,
        ]);

        return redirect()->route('wisata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(destinasi $wisatum)
    {
        $kategori = kategori::all();
        $wilayah = wilayah::all();

        $sldKat = $wisatum->kategori_id;
        $sldWil = $wisatum->wilayah_id;
        return view('wisata.edit', compact('wisatum', 'kategori', 'wilayah', 'sldKat', 'sldWil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, destinasi $wisatum)
    {
        $image = $request->file('photo')->store('content');

        $wisatum->update($request->all());
        $wisatum->update([
            'photo' => $image
        ]);
        return redirect()->route('wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(destinasi $wisatum)
    {
        $wisatum->delete();
        return redirect()->route('wisata.index');
    }
}
