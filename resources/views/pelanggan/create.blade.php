@extends('Layouts.app')

@section('content')
    <div class="container">

        <h3>Tambah Data Pelanggan</h3>
        <form action="{{ url('/pelanggan') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>NOMOR PELANGGAN</label>
                <input type="text" class="form-control" name="pel_no">
            </div>
            <div class="mb-3">
                <label>NAMA PELANGGAN</label>
                <input type="text" class="form-control" name="pel_nama">
            </div>
            <div class="mb-3">
                <label>ALAMAT</label>
                <input type="text" class="form-control" name="pel_alamat">
            </div>
            <div class="mb-3">
                <label>NO HP</label>
                <input type="text" class="form-control" name="pel_hp">
            </div>
            <div class="mb-3">
                <label>NIK</label>
                <input type="text" class="form-control" name="pel_ktp">
            </div>
            <div class="mb-3">
                <label>NO METERAN</label>
                <input type="text" class="form-control" name="pel_meteran">
            </div>
            <div class="mb-3">
                <input type="submit" value="SIMPAN" class="btn btn-success">
                <a href="{{ url('pelanggan/') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
</div>
@endsection