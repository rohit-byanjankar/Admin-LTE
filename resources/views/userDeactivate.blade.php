@extends('layouts.app')
@section('content')
<div class="col-md-6">
    <div>YOU ARE CURRENTLY DE-ACTIVATED.PLEASE FILL THIS FORM TO RE-ACTIVATE!</div>
<div>
    <form action="{{url('deactivated')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Phone Number" name="phone_number">
        </div>

        <button type="submit" class="btn btn-primary">Re-activate</button>
    </form>
</div>
</div>
@endsection