@extends('layouts.app')

@section('content')

<div class="container">

    <h3>Daftar Pelanggan
    <a class="btn btn-primary btn-sm float-end" href="{{ url('pelanggan/create') }}">
        Tambah Data</a>
    </h3>
    <br>
    <table class="table table-bordered table-hover border-dark text-center">
        <tr class="fw-bold table-active">
            <td>NO PELANGGAN</td>
            <td>NAMA PELANGGAN</td>
            <td>ALAMAT</td>
            <td>NO HP</td>
            <td>NIK</td>
            <td >NO METERAN</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
        @foreach($rows as $row)
        <tr class="fw-semibold">
            <td>{{ $row->pel_no }}</td>
            <td>{{ $row->pel_nama }}</td>
            <td>{{ $row->pel_alamat }}</td>
            <td>{{ $row->pel_hp }}</td>
            <td>{{ $row->pel_ktp }}</td>
            <td>{{ $row->pel_meteran }}</td>
            <td><a href="{{ url('pelanggan/' . $row->pel_id . '/edit') }}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ url('pelanggan/' . $row->pel_id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection