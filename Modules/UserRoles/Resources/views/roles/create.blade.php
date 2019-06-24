@extends('adminlte::page')

@section('content')
<div class="card card-default">
    <div class="card-header text-bold">
        {{ isset($role) ? 'Edit Role' : 'Create Role'}}
    </div>
    <div class="card-body">
       @include('partials.errors')
        <form action="{{ isset($role)? route('roles.update', $role->id) : route('roles.store')}}" method="POST">
            @csrf
            @if(isset($role))
             @method('PUT')
            @endif

            <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" id="name" name="name" class="form-control" value="{{ isset($role) ? $role->name: ''}}">
            </div>

            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($role) ? 'Update role' :  'Add role' }}
                 </button>
            </div>

        </form>
    </div>
</div>
@endsection