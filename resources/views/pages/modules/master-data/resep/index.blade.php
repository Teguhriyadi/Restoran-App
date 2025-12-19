@extends('pages.layouts.master')

@push('app_title', 'Master Resep Detail')

@push('app_css')
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('app_module')
    Data Resep Detail
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
            <a href="{{ url('/resep/create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Resep</th>
                            <th>Bahan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $nomer = 0
                        @endphp
                        @foreach ($bahan as $item)
                            <tr>
                                <td class="text-center">{{ ++$nomer }}.</td>
                                <td>{{ $item->nama_resep }}</td>
                                <td>
                                    @foreach ($item->detail_resep as $detail)
                                    <span class="badge bg-success text-white">
                                        {{ $detail->bahan->nama_bahan }}
                                    </span>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @if ($item->status == "1")
                                        <form action="{{ url('/resep/' . $item->id . '/change-status') }}" method="POST">
                                        @csrf
                                            @method("PUT")
                                            <button onclick="return confirm('Yakin ? Apakah Ingin Menon-Aktifkan Data Ini?')" type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i> Non - Aktifkan
                                            </button>
                                        </form>
                                    @elseif($item->status == "0")
                                        <form action="{{ url('/resep/' . $item->id . '/change-status') }}" method="POST">
                                            @csrf
                                                @method("PUT")
                                                <button onclick="return confirm('Yakin ? Apakah Ingin Mengaktifkan Data Ini?')" type="submit" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i> Aktifkan
                                                </button>
                                            </form>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('/resep-detail/' . $item->id . '/list') }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-plus"></i> Tambah Komponen
                                    </a>
                                    <a href="{{ url('/resep/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ url('/resep/' . $item->id) }}" method="POST" style="display: inline">
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
