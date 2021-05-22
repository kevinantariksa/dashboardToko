@extends('layouts.master')
@section('content')
    <br><br>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Oops! You're not supposed to get in here.</h3> <br>
            <h4><a href="{{ url('/') }}"><span class="text-underline">Back to Welcome screen</span></a></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="{{ asset('../assets/img/404default.gif?cb='.env('CB_VERSION')) }}" alt="404 Image" width="600" height="500">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            
        </div>
    </div>
    <br><br>
    
    
@endsection