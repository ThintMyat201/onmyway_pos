@extends('layouts.master')
@section('content')
<div class="container my-3">
    <div class="row align-items-center">
        <div class="col-12 col-md-7 mb-3 mb-md-0">
            @if (!$storeOpen)
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                        <form action="{{ route('openStore') }}" method="POST" id="openStoreForm">@csrf
                            <button type="button" class="btn btn-success btn-sm w-100 px-4" onclick="confirmOpenStore()">Open Store</button>
                        </form>
                    </div>
                    @if ($sessions->count() > 0 && $sessions->first()->closed_at)
                        <div class="col-12 col-sm-auto">
                            <a href="{{ route('generateReport') }}" class="btn btn-primary btn-sm w-100 px-4" target="_blank">
                                <i class="fas fa-file-pdf me-2"></i> Generate Report
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <form action="{{ route('closeStore') }}" method="POST" id="closeStoreForm">@csrf
                    <button type="button" class="btn btn-danger btn-sm px-4" onclick="confirmCloseStore()">Close Store</button>
                </form>
            @endif
        </div>
        <div class="col-12 col-md-5">
            <div class="d-flex justify-content-md-end align-items-center">
                <div class="h6 mb-0 text-nowrap">
                    <span class="d-inline-block me-2">Session Total:</span>
                    <span class="d-inline-block fw-bold">{{ number_format($totalAmount, 2) }} MMK</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @foreach ($sessions as $session)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <strong>Session Information:</strong><br>
                    Opened: {{ $session->opened_at ? $session->opened_at->format('Y-m-d H:i:s') : 'N/A' }} |
                    Status: <span class="badge {{ $session->closed_at ? 'badge-danger' : 'badge-success' }}">
                        {{ $session->closed_at ? 'Closed at '.$session->closed_at->format('Y-m-d H:i:s') : 'Currently Open' }}
                    </span>
                </div>
            </div>
            <div class="card-body position-relative">
                <div class="collapse show" id="session-table-{{ $session->id }}">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($session->sales as $item)
                                    <tr>
                                        <td>{{ $item->product->name ?? '-' }}</td>
                                        <td>{{ $item->product->price ?? '-' }} MMK</td>
                                        <td>{{ $item->description}}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->total }} MMK</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- {{-- Pagination links --}} -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Showing {{ $session->sales->firstItem() }} to {{ $session->sales->lastItem() }} 
                                of {{ $session->sales->total() }} entries
                            </div>
                            <div>
                                {{ $session->sales->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
@section('script-js')
<script>
    function confirmOpenStore() {
        Swal.fire({
            title: 'Open Store?',
            text: 'Are you sure you want to open the store?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, open it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('openStoreForm').submit();
            }
        });
    }

    function confirmCloseStore() {
        Swal.fire({
            title: 'Close Store?',
            text: 'Are you sure you want to close the store?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, close it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('closeStoreForm').submit();
            }
        });
    }
</script>
@endsection


