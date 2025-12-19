@extends('pages.layouts.master')

@push('app_title', 'Master Resep Detail')

@push('app_css')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('app_module')
    Data Resep :
    <strong>
        {{ $resep->nama_resep }}
    </strong>
@endpush

@push('app_content')

    @if (session('success'))
        <div class="alert alert-success">
            <strong>Berhasil,</strong>
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            <strong>Gagal,</strong>
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/resep-detail/' . $id . '/create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Bahan</th>
                            <th class="text-center">QTY</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomer = 0
                        @endphp
                        @foreach ($resep_detail as $item)
                            <tr>
                                <td class="text-center">{{ ++$nomer }}.</td>
                                <td> {{ $item->bahan->nama_bahan }}</td>
                                <td class="text-center">{{ $item->qty }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/resep-detail/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ url('/resep-detail/' . $item->id . '/delete-data') }}" method="POST" style="display: inline">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Yakin ? Apakah Data Ini Ingin Dihapus?')" type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endpush

@push('app_js')
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>
@endpush
