@extends('adminlte::page')
@section('content')
    <div class="container">
    <div class="col-md-10 blogShort">
         <h1>{{$meeting->title}}</h1>
         <i>  {{\Carbon\Carbon::parse($meeting->time)->format('d D-M Y')}}</i> <br>
         <article>
             <p>
            <h2>{{ $meeting->agenda }}</h2>
             </p>
         </article>
    </div>
    </div>
@endsection