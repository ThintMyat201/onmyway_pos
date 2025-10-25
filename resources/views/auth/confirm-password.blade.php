<x-guest-layout>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <body class="bg-light min-vh-100">
        <div class="container py-5">
            <div class="row min-vh-100 align-items-center justify-content-center">
                <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto">
                    <div class="card border-0 shadow-lg rounded-4">
                        <div class="card-body p-3 p-sm-4 p-lg-5">
                            <div class="text-center mb-4">
                                <h2 class="fw-bold mb-2 display-6">Confirm Password</h2>
                                <p class="text-muted mb-0 fs-6">This is a secure area. Please confirm your password before continuing.</p>
                            </div>

                            <form method="POST" action="{{ route('password.confirm') }}" class="mt-4">
                                @csrf

                                <div class="mb-4">
                                    <label for="password" class="form-label fw-medium mb-2">Password</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light border-end-0 rounded-start-4">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control form-control-lg border-start-0 rounded-end-4" 
                                            id="password" name="password" required 
                                            placeholder="Enter your password" autocomplete="current-password">
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="text-danger small mt-2" />
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg fw-medium rounded-4 py-3">
                                        <span class="fs-6">Confirm Password</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</x-guest-layout>
