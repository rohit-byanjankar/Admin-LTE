@extends('adminlte::page')

@section('content')

    <div class="card card-default">
        <div class=" card-header text-bold">
            {{ isset($phoneDirectory) ? 'Edit Phone Directory:' : 'Create Phone Directory:' }}
        </div>
        <div class="card-body">
        @include('partials.errors')
            <form action="{{ isset($phoneDirectory) ? route('directory.update', $phoneDirectory->id) : route('directory.store') }}" method="POST">
                @csrf
                @if(isset($phoneDirectory))
                @method('PUT')
                @endif
        <div class="container-fluid">
            <div class="form-group col-md-4">
                <label for="fname" >First Name:</label>
                <input type="text" class="form-control" name='fname' id='fname' value="{{ isset($phoneDirectory) ? $phoneDirectory->first_name : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="mname" >Middle Name:</label>
                <input type="text" name="mname" id="mname"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->middle_name : ''}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="lname" >Last Name:</label>
                <input type="text" name="lname" id="lname"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->surname : ''}}" required>
            </div>
        </div>

        <div class="container-fluid">
            <div class="form-group col-md-4">
                <label for="city" >City:</label>
                <input type="text" class="form-control" name='city' id='city' value="{{ isset($phoneDirectory) ? $phoneDirectory->city : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="street" >Street:</label>
                <input type="text" name="street" id="street"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->street : ''}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="hnumber" >Home Number:</label>
                <input type="text" name="home_number" id="hnumber" maxlength="10" class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->home_number : ''}}" required>
            </div>
        </div>

        <div class="container-fluid">
            <div class="form-group col-md-4">
                <label for="mnumber" >Mobile Number:</label>
                <input type="text" class="form-control" maxlength="14" name='mobile_number' id='mnumber' value="{{ isset($phoneDirectory) ? $phoneDirectory->mobile_number : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="onumber" >Office Number:</label>
                <input type="text" name="office_number" id="onumber" maxlength="10" class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->office_number : ''}}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="profession" >Profession:</label>
                <input type="text" name="profession" id="profession"  class="form-control" value="{{ isset($phoneDirectory) ? $phoneDirectory->profession : ''}}" required>
            </div>

            @if($categories->count()>0)
            <div class="col-md-4">
                <label for="category"> Category:</label>
                <select name="category"  class="form-control">
                    @foreach($categories as $category)
                        <option value=" {{ $category->id}} "
                                @if(isset($phoneDirectory))
                                @if($category->id == $phoneDirectory->phone_category_id)
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
        </div>
        <div class="col-md-12 margin text-center">
            <button type="submit" class="btn btn-success">
            {{ isset($phoneDirectory) ? 'EDIT DIRECTORY' : 'CREATE NOW!' }}
        </button>
        </div>
            </form>
         </div>
</div>
@endsection

