@extends('layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="login-sec" id="tabs">
            <ul class="sign-control">
                <li data-tab="tab-1" class="current">
                    <a href="#tabs-1">Log In</a>
                </li>
                <li data-tab="tab-2" class="current" >
                    <a href="#tabs-2">
                        Register
                    </a>
                </li>
            </ul>

            <div class="sign_in_sec" id="tabs-1">
                <h3>Log in</h3>
                <form method="POST" action="{{url('login')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                            <!--sn-field end-->
                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                            <i class="fa fa-lock"></i>
                                <input id="password-field"  type="password"  value="secret" class="form-control text-dark" placeholder="Password" name="password" required>
                                <span toggle="#password-field"  class="fa fa-fw fa-eye field-icon toggle-password" ></span>
                            </div>
                        </div>

                        <div class="col-lg-12 no-pdd">
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
                    <div class="col-lg-12 no-pdd">
                        <button type="submit" value="submit">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
        <!--sign_in_sec end-->

            <div class="sign_in_sec" id="tabs-2">
                <h3>Register</h3>
                <form action="{{url('register')}}" method="post" enctype="multipart/form-data" id="register_form">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                                <i class="fa fa-user"></i>
                                <input type="text" class="form-control" name="name" placeholder="Full Name" id="fname" required>
                                <p id="p1" class='text-danger small'></p>
                            </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                                <i class="fa fa-envelope"></i>
                                <input type="email" class="form-control" name="email" placeholder="Email" id="email" required>
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
                                <input type="password" class="form-control" name="password" placeholder="Password" id="psw" required>
                                <p id="p3" class='text-danger small'></p>
                            </div>
                        </div>
                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                                <i class="fa fa-lock"></i>
                                <input type="password" class="form-control" name="cpsw" placeholder="Confirm Password" id="cpsw" required>
                                <p id="p4" class='text-danger'></p>
                            </div>
                        </div>

                        <div class="col-lg-12 no-pdd">
                            <div class="sn-field">
                                <i class="fa fa-phone"></i>
                                <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number" maxlength="10" required>
                            </div>
                        </div>

                        <div class="col-lg-12 no-pdd ">
                            <div class="sn-field ">
                                <i class="fa fa-home"></i>
                                <input type="text" name="address" placeholder="Address" required>
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

                        <div class="col-lg-6 ml-5 mt-3">
                            <div class="sn-field">
                                <input type="button" class="btn btn-success pr-5" onclick="validateForm('register_form')" id="validate" value="Sign up" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--login-sec end-->
    </div>
@endsection
@section('scripts')
    <script src="{{asset('../Community-Media/resources/js/loginValidate.js')}}"></script>
    <script src="{{asset('../Community-Media/resources/js/registerValidate.js')}}"></script>
@endsection