@extends('adminlte::page')
@section('content')
    <div class="card card-default">
        <div class=" card-header text-bold ">
            Add Registrar
        </div>

        <div class="card-body">
        @include('partials.errors')
            <form action="{{ route('registrar.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="cname" >Community-Name</label>
                        <input type="text" class="form-control" name='cname' required>
                    </div>

                    <div class="form-group">
                        <label for="dbname" >Database Name</label>
                        <input type="text" class="form-control" name='dbname' required>
                    </div>

                    <div class="form-group">
                        <label for="curl" >Community Url</label>
                        <input type="text" class="form-control" name='curl' required>
                    </div>

                    <div class="form-group">
                        <label for="dbusername" >Database Username</label>
                        <input type="text" class="form-control" name='dbusername' required>
                    </div>

                    <div class="form-group">
                        <label for="dbpass" >Database Password</label>
                        <input type="password" class="form-control" name='dbpass' required>
                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                       CREATE REGISTRAR!
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
