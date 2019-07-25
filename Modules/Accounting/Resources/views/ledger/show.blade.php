@extends('adminlte::page')

@section('content')
<div class="row no-padding">
<div class="col-md-12 no-margin">
             <h1  class="no-margin">{{$post->title}}</h1>
             <h3 class="no-margin"> <i> {{ $post->category->name}} </i> </h3>
             <i  class="no-margin">Published by : {{ $post->user->name }} </i>  <br>
             <i>{{ $post->published_at }} </i> <br>
             <img src="{{url($post->image)}}" alt="post img" class="pull-left img-thumbnail margin" height="250px" width="250px">
             <article >
                <h2>{{ $post->description }}</h2>
                 <p>
                 {{ $post->content}}
                 </p>
             </article>
 </div>
</div>
@endsection