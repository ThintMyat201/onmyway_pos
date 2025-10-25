@extends('layouts.guest')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12">
        <div class="p-4 p-sm-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address..." name="email" autofocus value="{{ old('email') }}">
                    <x-input-error :messages="$errors->get('email')" class="text-danger small mt-2" />
                </div>
                <div class="form-group mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control form-control-user" id="password" placeholder="Password"
                            name="password" autocomplete="current-password">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-top-right-radius: 2rem; border-bottom-right-radius: 2rem;">
                                <i class="fas fa-eye-slash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="text-danger small mt-2" />
                </div>
                <div class="form-group mb-4">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block btn-lg">
                    Login
                </button>

            </form>
            <hr class="my-4">
            <div class="text-center mb-3">
                @if (Route::has('password.request'))
                <a class="small text-decoration-none" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>
            <div class="text-center">
                <a class="small text-decoration-none" href="{{ route('register') }}">Create an Account!</a>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const password = document.getElementById('password');
    const icon = this.querySelector('i');
    
    // Toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    // Toggle the icon
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});
</script>
@endsection