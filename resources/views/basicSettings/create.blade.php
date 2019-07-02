@extends('adminlte::page')

@section('content')

    <div class="card card-default">
        <div class=" card-header text-bold ">
            Add Setting
        </div>

        <div class="card-body">
        @include('partials.errors')
            <form action="{{ route('settings.store') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="key" >Title</label>
                        <input type="text" class="form-control" name='key' id='key' required>
                    </div>
                    <div class="form-group">
                        <label for="key" >Value</label>
                        <input type="text" class="form-control" name='value' id='key' required>
                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                       CREATE SETTINGS!
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
