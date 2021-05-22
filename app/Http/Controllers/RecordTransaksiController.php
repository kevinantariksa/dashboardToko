<?php

namespace App\Http\Controllers;

use App\RecordTransaksi;
use Illuminate\Http\Request;

class RecordTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaksi.viewTransaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecordTransaksi  $recordTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(RecordTransaksi $recordTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecordTransaksi  $recordTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(RecordTransaksi $recordTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecordTransaksi  $recordTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecordTransaksi $recordTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecordTransaksi  $recordTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecordTransaksi $recordTransaksi)
    {
        //
    }
}
