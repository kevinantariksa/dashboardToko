@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                <br><br>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Stop right there! This is page is prohibited!</h3> <br>
            <h4><a href="{{ url('/') }}"><span class="text-underline">Back to Welcome screen</span></a></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="{{ asset('../assets/img/403.gif?cb='.env('CB_VERSION')) }}" alt="IM WATCHING YOU" width="300" height="200">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            
        </div>
    </div>
    <br><br>
    
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
