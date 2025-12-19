@extends('pages.layouts.master')

@push('app_title', 'Master Resep Detail')

@push('app_module')
    Tambah Data Komponen Resep:
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

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ url('/resep-detail/' . $resep->id . '/list') }}" class="btn btn-outline-danger">
                        <i class="fa fa-sign-out-alt"></i> Kembali
                    </a>
                </div>
                <form action="{{ url('/resep-detail/' . $resep->id . '/store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bahan_id"> Nama Bahan </label>
                            <select name="bahan_id" class="form-control" id="bahan_id">
                                <option value="">- Pilih -</option>
                                @foreach ($bahan as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_bahan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty"> QTY </label>
                            <input type="number" class="form-control" name="qty" id="qty"
                                placeholder="Masukkan QTY" min="1">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
