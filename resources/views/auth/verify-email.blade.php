<x-guest-layout>
                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-2 display-6">Verify Email</h2>
                                <div class="text-muted fs-6">
                                    Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you. If you didn't receive the email, we will gladly send you another.
                                </div>
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success text-center mb-4">
                                    A new verification link has been sent to your email address.
                                </div>
                            @endif

                            <div class="d-grid gap-3">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-lg fw-medium rounded-4 py-3 w-100">
                                        <i class="fas fa-envelope me-2"></i>
                                        <span class="fs-6">Resend Verification Email</span>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-lg fw-medium rounded-4 py-3 w-100">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        <span class="fs-6">Log Out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
</x-guest-layout>
