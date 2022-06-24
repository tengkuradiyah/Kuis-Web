@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>Edit Data Golongan</h3>
        <form action="{{ url('/golongan/' . $row->gol_kode) }}" method="POST">
            @method('PATCH')
            @csrf
                <div class="mb-3">
                    <label>KODE</label>
                    <input type="text" class="form-control" name="gol_kode" value="{{ $row->gol_kode }}"></>
                </div>
                <div class="mb-3">
                    <label>NAMA</label>
                    <input type="text" class="form-control" name="gol_nama" value="{{ $row->gol_nama }}"></>
                </div>
                <div class="mb-3">
                    <input type="submit" value="UPDATE" class="btn btn-success">
                    <a href="{{ url('golongan/') }}" class="btn btn-secondary">Kembali</a>
                </div>
        </form>
    </div>
@endsection