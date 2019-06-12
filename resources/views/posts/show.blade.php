@extends('adminlte::page')

@section('content')
<div class="container">
<div class="col-md-10 blogShort">
                     <h1>{{$post->title}}</h1>
                     <h3> <i> {{ $post->category->name}} </i> </h3>
                     <i> Published by : {{ $post->user->name }} </i>  <br>
                     <i> {{ $post->published_at }} </i> <br>
                     <img src="{{url($post->image)}}" alt="post img" class="pull-left img-thumbnail img-bordered margin" height="200px" width="200px">
                     <article>
                         <p>
                        <h2> <b> {{ $post->description }}</b> </h2>
                         </p>
                         <p>
                         {{ $post->content}}
                         </p>
                     </article>
                
 </div>
</div>

	


  

 

 
               

@endsection