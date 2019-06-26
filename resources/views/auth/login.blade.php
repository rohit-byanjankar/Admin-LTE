@extends('layouts.app')
@section('content')
<div class="col-lg-12 ">
    <div class="login-sec" id="tabs">
        <ul class="sign-control col-md-3">
            <li data-tab="tab-1" class="active">
                <a href="#tabs-1" class=" active">Log In</a>
            </li>

            <li data-tab="tab-2" class="active">
                <a href="#tabs-2">
                    Register
                </a>
            </li>
        </ul>

        <div class="sign_in_sec current" id="tabs-1">
            <h3>Sign in</h3>
            <form method="POST" action="{{url('login')}}">
                {{ csrf_field() }}
                    <div class="col-lg-6 no-pdd">
                        <div class="sn-field">
                            <input type="text" class="form-control" placeholder="Email" name="email" required>
                            <i class="fa fa-user"></i>
                        </div>
                        <!--sn-field end-->
                    </div>
                    <div class="col-lg-6 no-pdd">
                        <div class="sn-field">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="col-lg-4 no-pdd">
                        <div class="checky-sec">
                            <div class="fgt-sec">
                                <input type="checkbox" name="cc" id="c1">
                                <label for="c1">
                                    <span></span>
                                </label>
                                <small>Remember me</small>
                            </div>
                            <!--fgt-sec end-->
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request')}}" title="">Forgot Password?</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 no-pdd">
                        <button type="submit" value="submit">Sign in</button>
                    </div>
            </form>
        </div>
        <!--sign_in_sec end-->

        <div class="sign_in_sec" id="tabs-2">
            <h3>Register</h3>
            <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="name" placeholder="Full Name" id="fname">
                            <p id="p1" class='text-danger small'></p>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                            <p id="p2" class='text-danger small'></p>
                        </div>
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <i class="fa fa-image"></i>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="password" placeholder="Password" id="psw">
                            <p id="p3" class='text-danger small'></p>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="cpsw" placeholder="Confirm Password" id="cpsw">
                            <p id="p4" class='text-danger'></p>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                            <div class="checky-sec st2">
                                <div class="fgt-sec">
                                    <input type="checkbox" name="cc" id="c2">
                                    <label for="c2">
                                        <span></span>
                                    </label>
                                    <small>Yes, I understand and agree to the Community Media Terms & Conditions.</small>
                                    <p id="p5" class='text-danger'></p>
                                </div>
                                <!--fgt-sec end-->
                            </div>
                    </div>

                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <button type="submit" class="btn btn-success" id="validate">Sign up</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        @if($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <!--dff-tab end-->
    </div>
@endsection
@section('scripts')
<script src="{{asset("js/loginValidate.js")}}"></script>
<script src="{{asset("js/registerValidate.js")}}"></script>
@endsection