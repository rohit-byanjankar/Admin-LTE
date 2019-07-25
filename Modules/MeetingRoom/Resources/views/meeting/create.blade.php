@extends('adminlte::page')
@section('content')
<div class="card card-default">
    <div class=" card-header">
        <h2 class="text-center text-info"> {{ isset($meeting) ? 'Edit meeting' : 'Create meeting' }} </h2>
</div>

<div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($meeting) ? route('meeting.update', $meeting->id) : route('meeting.store') }}" method="POST">
            @csrf
            @if(isset($meeting))
            @method('PUT')
            @endif
            <div class="row ">
                <div class="form-group col-md-4">
                    <label for="title"> Title </label>
                    <input type="text" class="form-control" name='title' id='title' value="{{ isset($meeting) ? $meeting->title : ''}}">
                </div>

                <div class="form-group col-md-4">
                    <label for="time"> Meeting Date </label>
                    <input type="datetime-local" placeholder="Select a Date" class="form-control" name='time' value="{{ isset($meeting) ? $meeting->time : ''}}">
                </div>
            </div>

            <div class="form-group ">
                <label for="agenda">Meeting Agenda</label> <br>
                <textarea rows="10" cols="150" name="agenda">
                {{ isset($meeting) ? $meeting->agenda : ''}}
                </textarea>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-success">
                    {{ isset($meeting) ? 'EDIT THIS meeting' : 'CREATE NOW!' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection