@extends('layouts.homeAdmin')

@section('content')
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="POST" action="{{url('/storeTransaksi')}}">
            {{csrf_field()}}
            <fieldset>
                <legend>Input Transaksi Baru</legend>
            <br>

            <div class="form-group">
                <label for="exampleSelect1">Barang yang dibeli</label>
                <br>
                <?php foreach ($barang as $brg): ?>
                    <label> <input type="checkbox" id="chckBox" name="barang[]" value={{$brg->nama_barang}} >{{$brg->nama_barang}} </label>
                    <input type="number" id="jml" name="jumlah[]"  min="1" class="form-control" aria-label="Jumlah item)">     
                    <br>
                <?php endforeach; ?>
            </div>

            <div class="form-group">
                <label class="control-label">Keterangan Transaksi</label>
                <br>
                <label for="exampleSelect1">Nomor Nota</label>
                <input type="text" name="nomor_nota" >
            </div>

            <div class="form-group">
                <label class="control-label">Nilai Transaksi</label>
                <input name="nilai_transaksi" type="number" min="1" class="form-control" value="">
                
            </div>

            <div class="form-group">
                <label class="control-label">Status</label>
                <input name="status" type="text"  class="form-control" placeholder="Lunas/DP" >
            </div>

            <div class="form-group">
                <label class="control-label">Customer / Note</label>
                <input name="keterangan" type="text"  class="form-control" >
            </div>

            </fieldset>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{url('/transaksi')}}" class="btn btn-danger">Back</a>
        </form>
    </div>
</div>

<script>
function UncheckAll(){ 
    var w = document.getElementsById('chckBox'); 
    for(var i = 0; i < w.length; i++){ 
        if(w[i].type=='checkbox'){ 
            w[i].checked = false; 
        }
    } 
}
function myFunction(){ 
    var z = document.getElementsById('jml'); 
    for(var i = 0; i < w.length; i++){ 
        if(z[i].type=='checkbox'){ 
            z[i].checked = false; 
        }
    } 
} 
</script>
@endsection