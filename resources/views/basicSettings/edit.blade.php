@extends('adminlte::page')

@section('content')
    <div class="card card-default">
        <div class=" card-header text-bold ">
            Edit Setting
        </div>
        <div class="card-body">
            @include('partials.errors')
                <form action="{{ route('settings.update', $settings->id) }}" method="POST">
                    @csrf
                        @method('PUT')
                    <div class="form-group">
                        <label for="key" >Title</label>
                        <input type="text" class="form-control" name='key' id='key' value="{{ $settings->key}}" required>
                    </div>
                    <div class="form-group">
                        <label for="value" >Value</label>
                        <input type="text" class="form-control" name='value' id='value' value="{{ $settings->value}}" required>
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
