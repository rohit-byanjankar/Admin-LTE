@extends('adminlte::page')

@section('content')

<div class="card card-default">
    <h4 class=" card-header text-center text-info">
        {{ isset($announcement) ? 'Edit announcement' : 'Create an announcement' }}
    </h4>

    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($announcement) ? route('announcements.update', $announcement->id) : route('announcements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($announcement))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="title"> Title </label>
                <input type="text" class="form-control" name='title' id='title' value="{{ isset($announcement) ? $announcement->title : ''}}">
            </div>

            <div class="form-group">
                <label for="details"> Details </label>
                <textarea name="details" id="details" cols="5" rows="5" class="form-control">{{ isset($announcement) ? $announcement->details : ''}}

                </textarea>
            </div>

            <div class="form-group">
                <label for="published_till"> Published Till </label>
                <input type="text" class="form-control" name='published_till' id='published_till' value="{{ isset($announcement) ? $announcement->published_till : ''}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($announcement) ? 'EDIT ANNOUNCEMENT' : 'CREATE NOW!' }}
                </button>
            </div>

        </form>
    </div>
</div>

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at', {
        enableTime: false
    })

    flatpickr('#published_till', {
        enableTime: false
    })

    $(document).ready(function() {
        $('.tags-selector').select2();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


@endsection