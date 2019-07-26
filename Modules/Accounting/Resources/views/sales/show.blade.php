@extends('adminlte::page')
@section('content')
    <div class="row no-padding">
        <div class="col-md-12 no-margin">
            <h1  class="no-margin">Seller Name : {{$purchase->biller}}</h1>
            <h3 class="no-margin"> Address : {{ $purchase->address}} </h3>
            <i  class="no-margin">Phone Number : {{ $purchase->phone_number }} </i>  <br>
            <i>Pan Number : {{ $purchase->pan_number }} </i>
        </div>
    </div>
@endsection