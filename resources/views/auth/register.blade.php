@extends('layouts.guest')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10 col-md-11 col-sm-12">
        <div class="p-4 p-sm-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <input type="text" class="form-control form-control-user" placeholder="First Name" id="name"
                            name="name" value="{{ old('name') }}" required autofocus>
                        <x-input-error :messages="$errors->get('name')" class="text-danger small mt-2" />
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-user" id="last_name"
                            placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <input type="email" class="form-control form-control-user" id="email"
                        placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="text-danger small mt-2" />
                </div>
                <div class="form-group row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-user"
                                placeholder="Password" id="password" name="password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-top-right-radius: 2rem; border-bottom-right-radius: 2rem;">
                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="text-danger small mt-2" />
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="password" class="form-control form-control-user" placeholder="Repeat Password"
                                id="password_confirmation" name="password_confirmation" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm" style="border-top-right-radius: 2rem; border-bottom-right-radius: 2rem;">
                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')"
                            class="text-danger small mt-2" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block btn-lg">
                    Register Account
                </button>

            </form>
            <hr class="my-4">
            <div class="text-center mb-3">
                <a class="small text-decoration-none" href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
            <div class="text-center">
                <a class="small text-decoration-none" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const password = document.getElementById('password');
    const icon = this.querySelector('i');
    
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});

document.getElementById('togglePasswordConfirm').addEventListener('click', function (e) {
    const password = document.getElementById('password_confirmation');
    const icon = this.querySelector('i');
    
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
});
</script>
@endsection