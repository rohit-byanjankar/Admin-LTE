@extends('adminlte::page')

@section('content')
<div class="container">
<div class="col-md-10 blogShort">
                     <h1>{{$event->title}}</h1>
                     <i>  {{\Carbon\Carbon::parse($event->event_date)->format('D,M-Y')}}</i> <br>
                     <h3> <i> {{ $event->venue}} </i> </h3>
                    
                     
                     
                     <article>
                         <p>
                        <h2> <b> {{ $event->details }}</b> </h2>
                         </p>
                         
                     </article>
                
 </div>
</div>

	


  

 

 
               

@endsection