@extends('adminlte::page')

@section('content')
<div class="fluid-container">
    <div class="card-header well">
        <h2>{{ $announcement->title }}</h2>
    </div>
    <div class="card-body well">
        <p>
            <p class="font-weight-bloder">{{ $announcement->details }}</p> <br>
            <p class="font-weight-lighter">Published At: {{\Carbon\Carbon::parse($announcement->created_at)->format('d D-M Y')}}</p> <br>
            <p class="font-weight-lighter">Published Till: {{\Carbon\Carbon::parse($announcement->published_till)->format('d D-M Y')}} </p>
        </p>
    </div>

</div>

@endsection