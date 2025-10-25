<x-guest-layout>
                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-2 display-6">Reset Password</h2>
                                <p class="text-muted mb-0 fs-6">Enter your new password below</p>
                            </div>

                            <form method="POST" action="{{ route('password.store') }}" class="mt-4">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="mb-4">
                                    <label for="email" class="form-label fw-medium mb-2">Email Address</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0 rounded-start-4">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="email" class="form-control form-control-lg border-start-0 rounded-end-4" 
                                            id="email" name="email" value="{{ old('email', $request->email) }}" required 
                                            autofocus placeholder="Enter your email" autocomplete="username">
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="text-danger small mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label fw-medium mb-2">New Password</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0 rounded-start-4">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control form-control-lg border-start-0 rounded-end-4" 
                                            id="password" name="password" required 
                                            placeholder="Enter new password" autocomplete="new-password">
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="text-danger small mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label fw-medium mb-2">Confirm New Password</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0 rounded-start-4">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control form-control-lg border-start-0 rounded-end-4" 
                                            id="password_confirmation" name="password_confirmation" required 
                                            placeholder="Confirm new password" autocomplete="new-password">
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small mt-2" />
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary fw-medium rounded-4 py-1">
                                        <span class="fs-6">Reset Password</span>
                                    </button>
                                </div>
                            </form>
                        </div>
</x-guest-layout>
