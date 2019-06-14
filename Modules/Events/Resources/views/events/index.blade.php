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
        {{\Carbon\Carbon::parse($event->event_date)->format('D,M-Y')}}
        <br>
        {{$event->venue}}
        <br>


        <a href=" {{ route('events.show', $event->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
        <a href=" {{ route('events.edit', $event->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> </a>

        <form action="{{ route('events.destroy', $event->id) }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i>
            </button>
        </form>

        
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteEventForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DELETE?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                             You will lose this forever.
                            </p>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes,Delete </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO,GO BACK</button>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @endforeach
</div>





@endsection


@section('scripts')
<script>
    function handleDelete(id)
    {
        

        var form = document.getElementById('deleteEventForm')
        form.action = '/Events/'+ id

        console.log('deleting.', id)

        $('#deleteModal').modal('show')
    }
</script>
@endsection