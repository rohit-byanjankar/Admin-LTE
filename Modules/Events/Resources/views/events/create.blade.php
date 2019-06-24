@extends('adminlte::page')

@section('content')

    <div class="card card-default">
        <div class=" card-header">
          <h2 class="text-center text-info">   {{ isset($event) ? 'Edit this Event' : 'Create Event' }}   </h2>
        </div>

        <div class="card-body">
        @include('partials.errors')
            <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if(isset($event))
                @method('PUT')
                @endif
                
                <div class="row ">
                <div class="form-group col-md-4">
                    <label for="title" > Title </label>
                    <input type="text" class="form-control" name='title' id='title' value="{{ isset($event) ? $event->title : ''}}">
                </div>

                 <div class="form-group col-md-4">
                    <label for="venue" > venue </label>
                    <input type="text" class="form-control" name='venue' id='venue' value="{{ isset($event) ? $event->venue : ''}}">
                </div>
                
                <div class="form-group col-md-4">
                    <label for="duration" > Duration of the Event(In Hours) </label>
                 <input type="number" min=1  class="form-control" name='duration' id='duration' value="{{ isset($event) ? $event->duration : '1'}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="event_date" > Event Date </label>
                    <input type="text" placeholder="Select a Date" class="form-control" name='event_date' id='date' value="{{ isset($event) ? $event->event_date : ''}}">
                </div>

         </div>
            <div class="form-group ">
                        <label for="detals" > Details </label> <br>
                        <textarea rows="10" cols="150" name="details">
                             {{ isset($event) ? $event->details : ''}}
                        </textarea>
            </div>
            <div class="form-group ">
                    <button type="submit" class="btn btn-success">
                        {{ isset($event) ? 'EDIT THIS EVENT' : 'CREATE NOW!' }}
                    </button>
                </div>
            </form>
    </div>
</div>
    
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script>
    flatpickr('#date',{
        enableTime : false
    })

    $(document).ready(function() {
     $('.tags-selector').select2();
    });

</script>




@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


@endsection
