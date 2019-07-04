@extends('adminlte::page')

@section('content')

    @can('create', \Modules\Events\Entities\Event::class)
        <a href="{{ route('events.create')}}" class="btn btn-success float-right ">
            Add Events
        </a>
    @endcan
    @if($events->count()>0)
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
            @can('view',$event)
                <a href=" {{ route('events.show', $event->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
            @endcan

            @can('update',$event)
                 <a href=" {{ route('events.edit', $event->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> </a>
            @endcan

            @can('delete',$event)
            <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('events.destroy', $event->id) }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
            @endcan
    </div>
    @endforeach
</div>
    @else
            <h3 class="text-center">
                No Events Yet
            </h3>
        @endif
@endsection
