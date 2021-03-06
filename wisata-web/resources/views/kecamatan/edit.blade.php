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
                  <h2 class="mb-3 line-head" id="buttons">Edit Kategori</h2>
                </div>
              </div>
            </div>
            <div class="row">
                <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST" class="col-12">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama wilayah</label>
                    <input class="form-control"  value="{{ $kecamatan->nama_wilayah }}" type="text"  placeholder="Masukan Nama wilayah, ex: Tanah Bumbu" name="nama_wilayah">
                  </div>
                  <div class="tile-footer">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('kecamatan.index')}}" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
          </div>
    </div>
  </main>
@endsection