@extends('layouts.master')

@section('content')
    <h1>Hello World</h1>
    <a href="{{route('ad.create')}}"> Post an ad.</a>
    <p>
        This view is loaded from module: {!! config('advertisement.name') !!}
    </p>
@endsection
