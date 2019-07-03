@extends('layouts.master')

@section('content')


<div class="container">
    <div class="main-section-data">
        <div class="card card-default mr-5 ml-5 mt-5">
            <div class=" card-header text-bold text-center ">
                Create a Post
            </div>

            <div class="card-body">
                @include('partials.errors')
                <form action="{{ route('userposts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title"> Title </label>
                        <input type="text" class="form-control" name='title' id='title' placeholder="Title of your Post">
                    </div>

                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea name="description" id="description" cols="5" rows="5" class="form-control">
                    </textarea>

                    </div>
                    <div class="form-group">
                        <label for="content"> Content </label>
                        <textarea name="content" id="content" cols="5" rows="5" class="form-control">
                    </textarea>
                    </div>


                    <div class="form-group">
                        <label for="image"> Image </label>
                        <input type="file" class="form-control" name='image' id='image'>
                    </div>



                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option value=" {{ $category->id }} " @if(isset($post)) @if($category->id == $post->category_id)
                                selected
                                @endif
                                @endif
                                >
                                {{ $category->name }}


                            </option>

                            @endforeach

                        </select>
                    </div>


                    @if($tags->count()>0)
                    <div class="form-group">
                        <label for="tags"> Tags </label>

                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @if(isset($post)) @if( $post->hasTag($tag->id ))
                                selected
                                @endif
                                @endif
                                >
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @endif



                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            {{ isset($post) ? 'EDIT THE POST' : 'CREATE NOW!' }}
                        </button>
                    </div>

                </form>
            </div>

        </div>


    </div>
</div>
<!--container end-->

@endsection


@section('scripts')

<script>
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