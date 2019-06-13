@extends('adminlte::page')

@section('content')

    <div class="card card-default">
        <div class=" card-header text-bold">
            {{ isset($phoneDirectory) ? 'Edit Phone Directory:' : 'Create Phone Directory:' }}
        </div>
        <div class="card-body">
        @include('partials.errors')
            <form action="{{ isset($phoneDirectory) ? route('directory.update', $phoneDirectory->id) : route('directory.store') }}" method="POST">
                @csrf
                @if(isset($phoneDirectory))
                @method('PUT')
                @endif
        <div class="row">
            <div class="form-group col-md-4">
                <label for="fname" >First Name:</label>
                <input type="text" class="form-control" name='fname' id='fname' value="{{ isset($phoneDirectory) ? $phoneDirectory->first_name : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="mname" >Middle Name:</label>
                <input type="text" name="mname" id="mname"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->middle_name : ''}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" >Last Name:</label>
                <input type="text" name="lname" id="lname"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->surname : ''}}" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="city" >City:</label>
                <input type="text" class="form-control" name='city' id='city' value="{{ isset($phoneDirectory) ? $phoneDirectory->city : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="street" >Street:</label>
                <input type="text" name="street" id="street"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->street : ''}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="hnumber" >Home Number:</label>
                <input type="text" name="hnumber" id="hnumber"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->home_number : ''}}" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="mnumber" >Phone Number:</label>
                <input type="text" class="form-control" name='mnumber' id='mnumber' value="{{ isset($phoneDirectory) ? $phoneDirectory->mobile_number : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="onumber" >Office Number:</label>
                <input type="text" name="onumber" id="onumber"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->office_number : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="profession" >Profession:</label>
                <input type="text" name="profession" id="profession"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->profession : ''}}" required>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">
                {{ isset($phoneDirectory) ? 'UPDATE DIRECTORY' : 'REGISTER' }}
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
    flatpickr('#published_at',{
        enableTime : true
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
