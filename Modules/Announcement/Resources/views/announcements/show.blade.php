@extends('adminlte::page')

@section('content')
<div class="fluid-container">
    <div class="card-header well">
        <h2>{{ $announcement->title }}</h2>
    </div>
    <div class="card-body well">
        <p>
            <p class="font-weight-bloder">{{ $announcement->details }}</p> <br>
            <p class="font-weight-lighter">Published At: {{ $announcement->published_at }}</p> <br>
            <p class="font-weight-lighter">Published Till: {{$announcement->published_till}} </p>
        </p>
    </div>

</div>

@endsection