@extends('layouts.app')

@section('content')
<div class="col-lg-6">


    <div class="row justify-content-center mt-5">

        <div class="card">

            <div class="card card-header text-center">
                <h3>Reset Password</h3>
            </div>




            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-field">
                            <label for="email" class=" col-form-label ">E-mail:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <!--sn-field end-->
                    </div>
                    <div class="col-lg-12 no-pdd text-center">

                        <button type="submit" class="btn btn-success ">
                            {{ __('Send Password Reset Link') }}
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection