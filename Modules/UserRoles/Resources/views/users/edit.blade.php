@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header text-bold text-center">
            My Profile
        </div>
    </div>
    <div class="card-body ">
        @include('partials.errors')
        <form action="{{ route('users.update-profile')}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="dp"> Profile Picture </label> <br>
              <img src="{{ asset($user->image) }} " alt="" height="300px" width="250px">
            </div>


            <div class="form-group">
                <label for="about"> About Me </label>
                <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->about }}
                     </textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Update Profile
            </button>
        </form>
    </div>
@endsection
 