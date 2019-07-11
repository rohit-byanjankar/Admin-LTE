@extends('layouts.master')

@section('content')


<div class="container">
    <div class="main-section-data">
        <div class="card card-default mr-5 ml-5 mt-5">
            @include('partials.errors')
            <div class=" card-header text-bold text-center ">
                Create an ad
            </div>

            <div class="card-body">

                <form action="{{ isset($classified) ? route('classified.update', $classified->id) : route('classified.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($classified))
                    @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="title"> Title </label>
                        <input type="text" class="form-control" name='title' id='title' placeholder="Title of your Ad" value="{{ isset($classified) ? $classified->title : ''}}" required min=5 max=20>
                    </div>


                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea name="description" id="description" cols="5" rows="5" class="form-control">
                        {{ isset($classified) ? $classified->description : ''}}
                        </textarea>

                    </div>



                    Image:
                    @if(isset($classified))
                    <div class="form-group">
                        <img src="{{ asset($classified->image)}}" alt="" width="20%">
                    </div>
                    @endif

                    <div class="form-group">
                        <input type="file" class="form-control" name='image' id='image'>
                    </div>

                    <div class="form-group">
                        <label for="price"> Price </label>
                        <input type="number" class="form-control" name='price' value="{{ isset($classified) ? $classified->price : ''}}" min=1 required>
                    </div>

                    @if($categories->count()>0)
                    <div class="form-group">
                        <label for="Adcategory">Select a Category:</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option value=" {{ $category->id }} " @if(isset($classified)) @if($category->id == $classified->category_id)
                                selected
                                @endif
                                @endif
                                >
                                {{ $category->name }}


                            </option>

                            @endforeach

                        </select>
                    </div>
                    @endif

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success">
                            {{ isset($classifieds) ? 'EDIT THE Ad' : 'CREATE NOW!' }}
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
<script type="text/javascript">
    $(function() {
        changeLanguage("dyn", "fa");
        $('#language').change(function() {
            lang = $(this).val();
            var control = $('#dyn');
            control.attr('lang', lang);
            var id = control.attr('id');
            changeLanguage(id, lang);
        });
    });
</script>




@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


@endsection