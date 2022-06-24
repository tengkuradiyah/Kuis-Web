@extends('layouts.app') 
 
 @section('content') 
 
<div class="container"> 
<h3>Daftar Golongan
    <a class="btn btn-primary btn-sm float-end" href="{{ url('golongan/create') }}">
        Tambah Data</a>
    </h3>
 
<table class="table table-bordered"> 
    <tr> 
        <td>KODE</td> 
        <td>NAMA GOLONGAN</td>
        <td>EDIT</td>
        <td>DELETE</td>  
    </tr> 
    @foreach($rows as $row)
    

<tr> 
    <td>{{ $row->gol_kode }}</td> 
    <td>{{ $row->gol_nama }}</td> 
    <td><a href="{{ url('golongan/' . $row->gol_kode . '/edit') }}" class="btn btn-warning">Edit</a></td>


            <td>
                <form action="{{ url('golongan/' . $row->gol_id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-danger">Hapus</button>
                </form>
            </td>
</tr> 
@endforeach 
 </table> 
</div> 

@endsection 