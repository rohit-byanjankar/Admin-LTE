@extends('adminlte::page')
@section('content')
    <a href="{{ route('meeting.create')}}" class="btn btn-success float-right ">
        Create Meeting
    </a>

    @if($meetings->count()>0)
<div class="row">
    @foreach($meetings as $meeting)
        <div class="card-body well col-lg-5 margin">
        <h4 class="lead">
        {{ $meeting->title }}
        </h4>
        {{\Carbon\Carbon::parse($meeting->time)->format('d D-M Y h:m:s')}}

        <a href=" {{ route('meeting.show', $meeting->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>

        <a href=" {{ route('meeting.edit', $meeting->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> </a>

        <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('meeting.destroy', $meeting->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
    @endforeach
</div>
    @else
            <h3 class="text-center">
                No Meetings Yet
            </h3>
        @endif
@endsection
