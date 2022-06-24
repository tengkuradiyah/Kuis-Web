<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Pelanggan::all();
        return view('pelanggan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
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
            'pel_no' => 'bail|required|unique:tb_pelanggan',
            'pel_nama' => 'required'
            ],
            [
                'pel_no.required' => 'Nomor Pelanggan wajib diisi',
                'pel_no.unique' => 'Nomor Pelanggan sudah ada',
                'pel_nama.required' => 'Nama wajib diisi'
            ]);

            Pelanggan::create([
                'pel_no' => $request->pel_no,
                'pel_nama' => $request->pel_nama,
                'pel_alamat' => $request->pel_alamat,
                'pel_hp' => $request->pel_hp,
                'pel_ktp' => $request->pel_ktp,
                'pel_meteran' => $request->pel_meteran
                ]);
                
                return redirect('pelanggan');
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
        $row = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('row'));
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
            'pel_no' => 'bail|required',
            'pel_nama' => 'required'
            ],
            [
            'pel_no.required' => 'Nomor Pelanggan wajib diisi',
            'pel_nama.required' => 'Nama Pelanggan wajib diisi'
            ]
            );

            $row = Pelanggan::findOrFail($id);
            $row->update([
            'pel_no' => $request->pel_no,
            'pel_nama' => $request->pel_nama,
            'pel_alamat' => $request->pel_alamat,
            'pel_hp' => $request->pel_hp,
            'pel_ktp' => $request->pel_ktp,
            'pel_meteran' => $request->pel_meteran
            ]);

            return redirect('pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Pelanggan::findOrFail($id);
        $row->delete();

        return redirect('pelanggan');
    }
}


