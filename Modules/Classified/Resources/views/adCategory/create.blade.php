@extends('adminlte::page')


@section('content')


<div class="card card-default">
    <div class="card-header text-bold">
        {{ isset($category) ? 'Edit Category' : 'Create Category'}}
    </div>
    <div class="card-body">
    @include('partials.errors')
        <form action="{{ isset($category)? route('classifiedcategory.update', $category->id) : route('classifiedcategory.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(isset($category))
             @method('PUT')
            @endif

            <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" id="name" name="name" class="form-control" value="{{ isset($category) ? $category->name: ''}}">
            </div>

            <div class="form-group">
                <label for="image"> Image </label>
                <input type="file" id="image" name="image" >
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