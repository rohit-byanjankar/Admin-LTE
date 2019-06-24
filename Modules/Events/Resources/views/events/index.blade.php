@extends('adminlte::page')

@section('content')
<a href="{{ route('events.create')}}" class="btn btn-success float-right ">
    Add Events
</a>
<br>
<div class="row">
    @foreach($events as $event)
        <div class="card-body well col-lg-5 margin">
        <h4 class="lead">
        {{ $event->title }}
        </h4>
        <br>
        {{\Carbon\Carbon::parse($event->event_date)->format('d D-M Y')}}
        <br>
        {{$event->venue}}
        <br>
        <a href=" {{ route('events.show', $event->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
        <a href=" {{ route('events.edit', $event->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> </a>
        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('events.destroy', $event->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
    @endforeach
</div>
@endsection
