@extends('layouts.app')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
                <p>A free and open source Bootstrap 4 admin template</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="tile col-12 mb-4">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="mb-3 line-head" id="buttons">Edit Data Destinasi</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form action="{{ route('wisata.update', $wisatum->id) }}" method="POST" class="col-12"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Destinasi</label>
                            <input class="form-control" type="text" placeholder="Masukan Nama wisata, ex: Pantai"
                                name="nama" value="{{ $wisatum->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="konten">Deskripsi</label>
                            <input class="form-control" type="text" placeholder="Masukan Deskripsi wisata" name="konten"
                                value="{{ $wisatum->konten }}">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input class="form-control" type="file" placeholder="" name="photo"
                                value="{{ $wisatum->photo }}">
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Nama kategori</label>
                            <select name="kategori_id" class="form-control">
                                @foreach ($kategori as $kt)
                                    @if ($kt->id == $sldKat)
                                        <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                    @endif
                                @endforeach
                                @foreach ($kategori as $kt)
                                    @if ($kt->id != $sldKat)
                                        <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama wilayah</label>
                            <select name="wilayah_id" class="form-control">
                                @foreach ($wilayah as $wl)
                                    @if ($wl->id == $sldWil)
                                        <option value="{{ $wl->id }}">{{ $wl->nama_wilayah }}</option>
                                    @endif
                                @endforeach
                                @foreach ($wilayah as $wl)
                                    @if ($wl->id != $sldWil)
                                        <option value="{{ $wl->id }}">{{ $wl->nama_wilayah }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('wisata.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
