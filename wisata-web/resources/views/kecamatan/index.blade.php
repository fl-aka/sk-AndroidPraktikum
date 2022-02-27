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
                  <h2 class="mb-3 line-head" id="buttons">List Wilayah
                  <a class="btn btn-md btn-success pull-right" href="{{ route('kecamatan.create') }}">Tambah Data</a>
                  </h2>
                </div>
              </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Wilayah</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @forelse($wilayah as $wy)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $wy->nama_wilayah }}</td>
                        <td class="text-center">
                            <a class="btn btn-md btn-warning" href="{{ route('kecamatan.edit', $wy->id) }}">Edit</a>
                            <form action="{{ route('kecamatan.destroy', $wy->id) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-md btn-danger"> Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-danger">Maaf Tidak Ada Data yang di tampilkan</td>
                    </tr>
                    @endforelse
                </table>
            </div>
          </div>
    </div>
  </main>
@endsection