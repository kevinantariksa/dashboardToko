@extends('layouts.homeAdmin')
@section('content')
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="POST" action="{{url('/updtBarang',array($barang->id_barang))}}">
            {{csrf_field()}}
            <fieldset>
                <legend>Edit Barang</legend>
            <br>

            <div class="form-group">
                <label for="exampleSelect1">Nama Barang</label>
                <input type="text" min="1" value="{{$barang->nama_barang}}" class="form-control" name="nama_barang" placeholder="Nama Barang">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail2">Kode Barang: </label>
                <input type="text" min="1" class="form-control" value="{{$barang->kode_barang}}" name="kode_barang" placeholder="Kode Barang">
            </div>

            <div class="form-group">
                <label class="control-label">Harga Modal</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                    </div>
                    <input name="harga_modal" type="number" min="1" value="{{$barang->harga_modal}}" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label">Harga Jual</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                    </div>
                    <input name="harga_jual" type="number" min="1" value="{{$barang->harga_jual}}" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Stok Barang</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input name="stok" type="number" min="1" class="form-control" value="{{$barang->stok_barang}}" aria-label="Amount (to the nearest dollar)">
                </div>
                </div>
            </div>

            </div>
            </fieldset>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{url('/barang')}}" class="btn btn-danger">Back</a>
            </fieldset>
        </form>
    </div>
</div>
@endsection