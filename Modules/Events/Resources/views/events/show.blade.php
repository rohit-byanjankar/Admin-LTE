@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="col-md-10 blogShort">
             <h1 class="text-info">{{$event->title}}</h1>
             <h3>On :<i> {{}}</i></h3>
             <h3>Location : <i> {{ $event->venue}} </i> </h3>
            <h3><b>Description :</b> <i> {{ $event->description}} </i> </h3>
            <img src="{{asset($event->image)}}">
                 <p class=" text-bold">
                    {{ $event->details }}
                 </p>
        </div>
    </div>
@endsection