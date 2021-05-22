<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::get();

        return view ('barang.tampilBarang',['barang'=>$barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('barang.barangBaru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fct=new Barang;
        $fct->nama_barang = $request->input('nama_barang');
        $fct->kode_barang = $request->input('kode_barang');
        $fct->harga_modal = $request->input('harga_modal');
        $fct->harga_jual = $request->input('harga_jual');
        $fct->stok_barang = $request->input('stok');
        $fct->save();
        return redirect('/barang')->with('message','New Item Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang,$id)
    {
        $barang=Barang::where('id_barang',$id)->first();
        return view('barang.editBarang',compact('barang',$barang));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang, $id)
    {
        $barang=Barang::where('id_barang',$id)->first();

        $data = array('id_barang'=>$barang->id_barang,
        'nama_barang'=> $request->input('nama_barang'),
        'kode_barang'=> $request->input('kode_barang'),
        'harga_modal'=> $request->input('harga_modal'),
        'harga_jual'=> $request->input('harga_jual'),
        'stok_barang'=> $request->input('stok')
        );
        Barang::where('id_barang',$id)->update($data);
        return redirect('/barang')->with('info','Item Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang,$id)
    {
        Barang::where('id_barang',$id)->delete();
        return redirect('/barang')->with('info','Item Delete Successfully');
    }
    public function search(Request $request){
        $temp=$request->input('search');
        if(is_null($temp)){
        dd('cannot be null, parameter pencarian hanya nama dan kode barang, please go back');
        }
        else{
        $barang= Barang::where('barangs.nama_barang','like',$temp)
                ->orWhere('barangs.kode_barang','like',$temp)
                ->get();
        }
        //$barang=Barang::all();
        return view('barang.tampilBarang',compact('barang',$barang));
    }
}
