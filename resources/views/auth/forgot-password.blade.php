@extends('layouts.guest')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12">
        <div class="p-4 p-sm-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-3">Forgot Your Password?</h1>
                <p class="mb-4 text-muted">We get it, stuff happens. Just enter your email address below
                    and we'll send you a link to reset your password!</p>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="user" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group mb-4">
                    <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address..." name="email" autocomplete="username"
                        value="{{ old('email') }}" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="text-danger small mt-2" />
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block btn-lg mb-4">
                    Reset Password
                </button>
            </form>
            <hr class="my-4">
            <div class="text-center mb-3">
                <a class="small text-decoration-none" href="{{ route('register') }}">Create an Account!</a>
            </div>
            <div class="text-center">
                <a class="small text-decoration-none" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>
@endsection