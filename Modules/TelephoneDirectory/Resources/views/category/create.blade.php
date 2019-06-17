@extends('adminlte::page')


@section('content')


<div class="card card-default">

    <div class="card-header text-center">
        {{ isset($category) ? 'Edit Category' : 'Create Category'}}
    </div>
    <div class="card-body">
    @include('partials.errors')
        <form action="{{ isset($category)? route('category.update', $category->id) : route('category.store')}}" method="POST">
            @csrf

            @if(isset($category))
             @method('PUT')
            @endif

            <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" id="name" name="name" class="form-control" value="{{ isset($category) ? $category->name: ''}}">
            </div>

            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($category) ? 'Update Category' :  'Add Category' }}
                 </button>
            </div>

        </form>
    </div>
</div>
@endsection