@extends('adminlte::page')
@section('content')
<div>
    <a href="{{ route('announcements.create')}}" class="btn btn-success float-right ">
        Add Announcement
    </a>
</div>
@if($announcements->count()>0)
<div class="row">
    @foreach($announcements as $announcement)
    <div class=" card-body well col-lg-5 margin">
        <h4 class="lead">{{$announcement->title}}</h4>
        <small class="text-muted">Published At : {{$announcement->published_at}}</small><br>
        <a href=" {{ route('announcements.show', $announcement->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
        <a href=" {{ route('announcements.edit', $announcement->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('announcements.destroy' ,$announcement->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
        </form>
    </div>
    @endforeach
</div>

@else
<h3 class="text-primary text-center">
    No Post Yet
</h3>
@endif
</div>


@endsection