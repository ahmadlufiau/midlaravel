<?php

namespace App\Http\Controllers;

use Auth;
use App\Pengeluaran;
use App\Kategori;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Cara 1 $id diganti Kategori $kategori
        //return view('pengeluaran.index', compact('kategori'));

        // Cara 2
        $kategori = Kategori::findOrFail($id);
        return view('pengeluaran.index', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $kategori = Kategori::findOrFail($id);
        return view('pengeluaran.create', ['edit' => false, 'kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $kategori = Kategori::findOrFail($id);

        $data = new Pengeluaran();
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->kategori_id = $kategori->id;
        $data->user_id = Auth::user()->id;
		$data->save();
        return redirect()->route ('kategori.pengeluaran.index', $kategori);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($kategoriId, $pengeluaranId)
    {
        //
        $kategori = Kategori::findOrFail($kategoriId);
    
        $data = $kategori->pengeluaran()->findOrFail ($pengeluaranId);
        return view('pengeluaran.create',['edit' => true])
                ->with('kategori', $kategori)
                ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategoriId, $pengeluaranId)
    {
        //
        $kategori = Kategori::findOrFail($kategoriId);

        $data = $kategori->pengeluaran()->findOrFail($pengeluaranId);
        $data->tanggal = $request->tanggal;
        $data->nama = $request->nama;
        $data->jumlah = $request->jumlah;
        $data->kategori_id = $kategori->id;
        $data->user_id = Auth::user()->id;
		$data->save();
        return redirect()->route ('kategori.pengeluaran.index', $kategori);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($kategoriId, $pengeluaranId)
    {
        //
        $kategori = Kategori::findOrFail($kategoriId);

        $kategori->pengeluaran()
                ->findOrFail($pengeluaranId)
                ->delete();
        return redirect()->route ('kategori.pengeluaran.index', $kategori);
    }
}
