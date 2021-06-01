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
                <div class="pull-left"> <legend>Data Transaksi</legend> </div>
                <div class="pull-right"> <a href='{{url("/transaksiBaru")}}' class="btn button-primary">New Transaction</a></div>
            </div>
        </div>

        <table class="table table-hover">
        <thead>
            <form class="form-inline" method="GET" action="{{url('/searchTransaksi')}}">
                <input type="text" class="form-control" name="search" placeholder="Enter Keywords" align="right">
                <button type="submit" class="btn btn-secondary">Search</button>
                <a href="{{url('/transaksi')}}" class="btn btn-danger">Back</a>
            </form>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">No. Nota</th>
                <th scope="col">Nilai Transaksi</th>
                <th scope="col">Payment</th>
                <th scope="col">Detail Transaksi</th>
                <th scope="col">Customer</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($transaksi)>0)
            <?php foreach ($transaksi as $trs): ?>
                <tr class="table-light">
                    <th>{{$trs->id_transaksi}}</th>
                    <td>{{$trs->tanggal_transaksi}}</td>
                    <td>{{$trs->nomor_nota}}</td>
                    <td>Rp {{number_format($trs->nilai_transaksi,2)}}</td>
                    <td>{{$trs->status}}</td>
                    <td>
                        @foreach($recordTransaksi as $rct)
                            @if ($rct->id_transaksi==$trs->id_transaksi)
                                {{$rct->id_barang}}:
                                {{$rct->jumlah_barang}} Unit
                                <br>
                            @endif
                        @endforeach
                    </td>
                    <td>{{$trs->keterangan}}</td>
                    <td>
                        <a href='{{url("/updateBarang/{$trs->id_transaksi}")}}' class="badge badge-success">Update</a>
                        <a href='{{url("/deleteBarang/{$trs->id_transaksi}")}}' class="badge badge-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        @endif
        </tbody>
    </table>

    </div>
</div>
@endsection