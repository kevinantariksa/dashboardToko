<?php

namespace App\Http\Controllers;
use DB;
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
        //dd($request);
        //Simpan Transaksi lalu record Transaksi

        $fct = new Transaksi;
        $fct->tanggal_transaksi = Carbon::now();
        $fct->nomor_nota = $request->input('nomor_nota');
        $fct->nilai_transaksi = $request->input('total');
        $fct->profit = $request->input('profit');
        $fct->keterangan = $request->input('keterangan');
        $fct->status = $request->input('status');
        //$fct->save();
        
        $arr_length = count($request->nama_barang);
        $latest = Transaksi::latest('id_transaksi')->first();
        
        for($i=0; $i<$arr_length;$i++){
            $nama_brg = $request->input('nama_barang')[$i];
            $jml=$request->input('jumlah')[$i];
            $values[]=[
                'id_transaksi'=>$latest,
                'id_barang'=> $nama_brg,
                'jumlah_barang' => $jml,
                'total_harga' => $request->input('total'),
                'nomor_nota' => $request->input('nomor_nota'),
                'tanggal_transaksi' => Carbon::now()
            ];
            $final_stok=$request->input('stok')[$i] - $jml;
           // dd($final_stok);
            $data = array(
                'id_barang'=>$request->input('barang'),
                'stok_barang'=> $final_stok
            );
            Barang::where('id_barang',$id)->update($data);
            
        }
        dd($values);
        //RecordTransaksi::insert($values);
        //DB::table('record_transaksis')->insert($values);
        

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
