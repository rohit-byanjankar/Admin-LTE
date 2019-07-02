@extends('layouts.master')



@section('content')




<div class="container">

    <div class="card mr-5 ml-5 mt-5">
        @auth
        @if(session()->has('error'))
        <div class="alert alert-danger text-center alert-dismissible">
            {{ session()->get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success text-center alert-dismissible">
            {{ session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @endauth
        <div class="card card-header text-center">
            Post an ad.
        </div>
        <div class="card card-body">
            <div class="col-12">

                <div class="col-lg-12">

                    <form action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text" class="form-control" name='title' id='title' placeholder="Title of your Ad">
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



                        <label for="image" class="mb-2"> Image: </label> <br>
                        <input type="file" class="form-control" name='image' id='image'>

                        <div class="form-group">
                    <label for="Adcategory">Advertisement Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value=" {{ $category->id }} "
                               @if(isset($advertisement))
                                @if($category->id == $advertisement->category_id)
                                        selected
                                @endif
                               @endif
                            >
                                {{ $category->name }}                                    
                            </option>
                        @endforeach                       
                    </select>
                </div>







                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-success">
                                <!-- {{ isset($advertisement) ? 'EDIT THE POST' : 'CREATE NOW!' }} -->
                                create
                            </button>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </div>

</div>
@endsection