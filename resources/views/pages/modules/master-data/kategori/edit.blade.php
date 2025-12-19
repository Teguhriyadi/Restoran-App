@extends('pages.layouts.master')

@push('app_title', 'Master Kategori')

@push('app_module')
    Edit Data Kategori
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
                    <a href="{{ url('/kategori') }}" class="btn btn-outline-danger">
                        <i class="fa fa-sign-out-alt"></i> Kembali
                    </a>
                </div>
                <form action="{{ url('/kategori/' . $edit->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_kategori"> Nama Kategori </label>
                            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                                placeholder="Masukkan Nama Kategori" value="{{ $edit->nama_kategori }}">
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
