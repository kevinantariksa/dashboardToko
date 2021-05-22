@extends('layouts.homeAdmin')

@section('content')
<div class="container">
    <div class="row">
    @if(session('info'))
        {{session('info')}}
    @endif
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"> <legend>Inventory Barang</legend> </div>
            <div class="pull-right"> <a href='{{url("/tambahBarang")}}' class="btn button-primary">New Item</a></div>
        </div>
    </div>
    
    
    <table class="table table-hover">
        <thead>
            <form class="form-inline" method="GET" action="{{url('/fasilitasSearch')}}">
                <input type="text" class="form-control" name="search" placeholder="Enter Keywords" align="right">
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Harga Modal</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($barang)>0)
            <?php foreach ($barang as $brg): ?>
                <tr class="table-light">
                    <th>{{$brg->id_barang}}</th>
                    <td>{{$brg->kode_barang}}</td>
                    <td>{{$brg->nama_barang}}</td>
                    <td>Rp {{number_format($brg->harga_modal,2)}}</td>
                    <td>Rp {{number_format($brg->harga_jual,2)}}</td>
                    <td>
                        @if ($brg->stok_barang>=1)
                            {{$brg->stok_barang}}
                            <a class="btn btn-success text-light" data-toggle="modal" id="smallButton" data-target="#smallModal"
                                data-attr='{{url("/")}}' title="Create a project"> <i class="fas fa-plus-circle"></i>
                            </a>
                        @else
                            Unavailable
                        @endif
                    </td>
                    <td>
                        <a href='{{url("/updateBarang/{$brg->id_barang}")}}' class="badge badge-success">Update</a>
                        <a href='{{url("/deleteBarang/{$brg->id_barang}")}}' class="badge badge-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        @endif
        </tbody>
    </table>
    </div>
</div>

<script>
     $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
</script>
@endsection
