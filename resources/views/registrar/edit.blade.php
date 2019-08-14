@extends('adminlte::page')
@section('content')
    <div class="card card-default">
        <div class=" card-header text-bold ">
            Edit Setting
        </div>
        <div class="card-body">
            @include('partials.errors')
                <form action="{{ route('registrar.update', $settings->id) }}" method="POST">
                    @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label for="cname" >Community-Name</label>
                        <input type="text" class="form-control" name='cname' value="{{$settings->community_name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="dbname" >Database Name</label>
                        <input type="text" class="form-control" name='dbname' value="{{$settings->database_name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="curl" >Community Url</label>
                        <input type="text" class="form-control" name='curl' value="{{$settings->community_url}}" required>
                    </div>

                    <div class="form-group">
                        <label for="dbusername" >Database Username</label>
                        <input type="text" class="form-control" name='dbusername' value="{{$settings->database_username}}" required>
                    </div>

                    <div class="form-group">
                        <label for="dbpass" >Database Password</label>
                        <input type="password" class="form-control" name='dbpass' value="{{$settings->database_password}}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                           EDIT SETTINGS
                        </button>
                    </div>
                </form>
        </div>
    </div>
@endsection
