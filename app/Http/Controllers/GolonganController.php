<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Golongan::all();
        return view('golongan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gol_kode' => 'bail|required|unique:tb_golongan',
            'gol_nama' => 'required'
            ],
            [
                'gol_kode.required' => 'KODE wajib diisi',
                'gol_kode.unique' => 'KODE sudah ada',
                'gol_nama.required' => 'Nama wajib diisi'
            ]);
            
            Golongan::create([
                'gol_kode' => $request->gol_kode,
                'gol_nama' => $request->gol_nama
                ]);
                
                return redirect('golongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Golongan::findOrFail($id);
        return view('golongan.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'gol_kode' => 'bail|required',
            'gol_nama' => 'required'
            ],
            [
            'gol_kode.required' => 'KODE wajib diisi',
            'gol_nama.required' => 'NAMA wajib diisi'
            ]
            );
            
            $row = Golongan::findOrFail($id);
            $row->update([
            'gol_kode' => $request->gol_kode,
            'gol_nama' => $request->gol_nama,
            ]);
            
            return redirect('golongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Golongan::findOrFail($id);
        $row->delete();

        return redirect('golongan');
    }
}
