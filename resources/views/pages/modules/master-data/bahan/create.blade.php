@extends('pages.layouts.master')

@push('app_title', 'Master Bahan')

@push('app_module')
    Tambah Data Bahan
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
                    <a href="{{ url('/bahan') }}" class="btn btn-outline-danger">
                        <i class="fa fa-sign-out-alt"></i> Kembali
                    </a>
                </div>
                <form action="{{ url('/bahan') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_bahan"> Nama Bahan </label>
                            <input type="text" class="form-control" name="nama_bahan" id="nama_bahan"
                                placeholder="Masukkan Nama Bahan">
                        </div>
                        <div class="form-group">
                            <label for="kategori_id"> Kategori </label>
                            <select name="kategori_id" class="form-control" id="kategori_id">
                                <option value="">- Pilih -</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
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
