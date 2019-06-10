@extends('layouts.app')

@section('content')
    <div class="card mt-1" style="margin:auto; width:400px;">
        <form class="card-body" action="{{url('register')}}"  method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="d-flex justify-content-center nav nav-tabs">
                <span class="nav-item"><a href="{{url('login')}}" class="nav-link">Log In</a></span>
                <span class="nav-item "><a href="#" class="nav-link active">Sign Up</a></span>
            </div>

            <div class="row mt-1">
                    <span class="col-md-12">
                        <label for="Fname">Full Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name" id="fname">
                        <p id="p1" class='text-danger small'></p>
                    </span>
            </div>

            <div class="mt-1">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                <p id="p2" class='text-danger small'></p>
            </div>

            <div class="mt-1">
                <label for="email">Profile Picture:</label>
                <input type="file" class="form-control" name="image" placeholder="image" id="image" required>
            </div>

            <div class="row mt-1">
							<span class="col-md-6">
								<label for="password">Password:</label>
								<input type="password" class="form-control" name ="password" placeholder="Password" id="psw">
								<p id="p3" class='text-danger small'></p>
							</span>

                <span class="col-md-6">
								<label for="Cpassword">Confirm Password:</label>
								<input type="password" class="form-control" name="cpsw" placeholder="Confirm Password" id="cpsw">
								<p id="p4" class='text-danger'></p>
							</span>
            </div>

            <div class="d-flex justify-content-center mt-1">
                <button type="submit" class="btn btn-success" id="validate">Sign up</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/formval.js')}}"></script>
@endsection
