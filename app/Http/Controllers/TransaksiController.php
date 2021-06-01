<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\RecordTransaksi;
use App\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi=Transaksi::get();
        $recordTransaksi=RecordTransaksi::get();
        //dd($transaksi);

        return view('transaksi.tampilTransaksi',['transaksi'=>$transaksi,'recordTransaksi'=>$recordTransaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::get();
        return view('transaksi.newTransaction',['barang'=>$barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Simpan Transaksi lalu record Transaksi
        $fct=new Transaksi;
        $fct->tanggal_transaksi = Carbon::now();
        $fct->nomor_nota = $request->input('nomor_nota');
        $fct->nilai_transaksi = $request->input('nilai_transaksi');
        $fct->profit = $request->input('nilai_transaksi');
        $fct->keterangan = $request->input('keterangan');
        $fct->status = $request->input('status');
        $fct->save();
        
        $id=Transaksi::latest('id_transaksi')->first();
        $input = new RecordTransaksi;
        $input->id_transaksi = $id->id_transaksi;
        $input['id_barang']= $request->input('barang');
        $input['jumlah_barang'] = $request->input('jumlah');
        $input->total_harga = $request->input('nilai_transaksi');
        $input->nomor_nota = $request->input('nomor_nota');
        $input->tanggal_transaksi = Carbon::now();
        //dd($request);
        $input->save();

        $transaksi=Transaksi::get();
        $recordTransaksi=RecordTransaksi::get();
        //dd($transaksi);

        return view('transaksi.tampilTransaksi',['transaksi'=>$transaksi,'recordTransaksi'=>$recordTransaksi]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
