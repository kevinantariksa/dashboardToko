@extends('layouts.homeAdmin')
@section('content')
<div class="container">
    <div class="row">
        <form class="form-horizontal" method="POST" action="{{url('/addBarang')}}">
            {{csrf_field()}}
            <fieldset>
                <legend>Input Barang Baru</legend>
            <br>

            <div class="form-group">
                <label for="exampleSelect1">Nama Barang</label>
                <input type="text" min="1" class="form-control" name="nama_barang" placeholder="Nama Barang">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail2">Kode Barang: </label>
                <input type="text" min="1" class="form-control" name="kode_barang" placeholder="Kode Barang">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail2">Satuan: </label>
                {{-- <select name="province" id="province" class="form-control">
                    <option value="">== Select Province ==</option>
                    @foreach ($provinces as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select> --}}
            </div>

            <div class="form-group">
                <label for="exampleInputEmail2">Merk: </label>
                <input type="text" min="1" class="form-control" name="kode_barang" placeholder="Kode Barang">
            </div>
            
            <div class="form-group">
                <label class="control-label">Stok Barang</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    </div>
                    <input name="stok" type="number" min="1" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Harga Modal</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                    </div>
                    <input id="text" name="harga_modal" autocomplete="off" onchange="myFunction()" type="number" min="1" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Harga Jual</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Pilih berapa persen keuntungan dari harga beli</span>
                    </div>
                    <select id="cars" name="status" class="form-control" onchange="myFunction()"></select>
                    <span class="input-group-text">Harga jual final: Rp</span>
                    <input name ="harga_jual" id="harga_jual" type="number" min="1" class="form-control" readonly  autocomplete="off">
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Harga Jual 2</label>
                <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                    </div>
                    <input name="harga_jual2" type="number" min="1" class="form-control" aria-label="Amount (to the nearest dollar)">
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
<script>
    (function() {
    var elm = document.getElementById('cars'),
        df = document.createDocumentFragment();
    for (var i = 0; i <= 100; i+=5) {
        var option = document.createElement('option');
        option.value = i;
        option.appendChild(document.createTextNode(i + "%"));
        df.appendChild(option);
    }
    elm.appendChild(df);
    }());
    function myFunction() {
        var x = document.getElementById("cars").value;
        var harga = document.getElementById("text").value;
        
        if(x==0){
            document.getElementById("harga_jual").value = document.getElementById("text").value
        }
        else{
            var total = (parseFloat(harga)+(x/100*parseFloat(harga)))
            document.getElementById("harga_jual").value =total
        }
    }
</script>
@endsection