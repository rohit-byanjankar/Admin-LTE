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
    <div>
        <a href=" {{ route('announcements.edit', $announcement->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('announcements.destroy' ,$announcement->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
        </form>
    </div>
</div>

@endsection