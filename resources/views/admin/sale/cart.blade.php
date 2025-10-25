@extends('layouts.master')
@section('content')
    <div class="container-fluid px-2 px-md-4 py-2">
        <h3 class="mb-4 text-center text-md-start">Your Shopping Cart</h3>
        <div class="row g-4 flex-lg-row flex-column">
            <div class="col-12 col-lg-8 order-1 order-lg-1">
                <h5 class="mb-3 d-block"><!-- Cart Items -->Cart Items</h5>
                <div class="card mb-4 shadow-sm">
                    <div class="card-body p-2 p-md-4">
                        @forelse ($cartData as $item)
                            <div class="row cart-item align-items-center gy-2 mb-4 px-1 px-sm-2" data-product-id="{{ $item->product_id }}">
                                <div class="col-4 col-sm-2 text-center mb-2 mb-sm-0">
                                    <img src="{{ asset('images/' . $item->image) }}" alt="Product Image"
                                        class="img-thumbnail rounded w-100" style="max-width:80px; height:auto; object-fit:cover;">
                                </div>
                                <div class="col-8 col-sm-3 mt-2 mt-sm-0 d-flex flex-column align-items-center align-items-sm-start justify-content-center">
                                    <span class="card-title mb-1 w-100" style="max-width:120px; white-space:normal;">{{ $item->name }}</span>
                                    <span class="fw-bold price mb-0 w-100" style="max-width:120px; white-space:normal;">{{ number_format($item->price) }} mmk</span>
                                </div>
                                <div class="col-6 col-sm-3 mt-2 mt-sm-0 text-center">
                                    <div class="input-group quantity justify-content-center flex-nowrap">
                                        <button class="btn btn-outline-secondary btn-sm btn-minus" type="button">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input style="max-width:60px" type="text"
                                            class="form-control form-control-sm text-center quantity-input qty"
                                            value="1">
                                        <button class="btn btn-outline-secondary btn-sm btn-plus" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-3 mt-2 mt-sm-0 text-center">
                                    <p class="total mb-0" style="white-space:normal;"></p>
                                </div>
                                <div class="col-5 col-sm-1 text-center mt-2 mt-sm-0 d-flex align-items-center justify-content-center">
                                    <a href="{{ route('cartDelete', $item->cart_id) }}"
                                        class="btn btn-sm btn-outline-danger px-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <hr class="d-block d-sm-none my-2">
                        @empty
                            <div class="text-center py-5">
                                <p class="text-muted">Your cart is empty.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <!-- Continue Shopping Button -->
                <div class="text-start mb-4">
                    <a href="{{ route('saleProductView') }}" class="btn btn-outline-primary d-inline-flex align-items-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back to Shop</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-4 order-2 order-lg-2">
                <!-- Cart Summary -->
                <div class="card cart-summary mb-4 shadow-sm position-sticky" style="top: 1rem; z-index: 1;">
                    <div class="card-body p-3 p-md-4">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        <div class="d-flex flex-column flex-sm-row justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span id="cart-subtotal"></span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" cols="10" rows="5"
                                class="form-control" placeholder="Enter Description..."
                                required>{{ old('description') }}</textarea>
                            <div class="invalid-feedback text-danger description-error">
                                Description is required
                            </div>
                        </div>
                        <button id="checkout-btn" class="btn btn-primary w-100">Proceed to Checkout</button>
                    </div>
                </div>
                <!-- Promo Code -->
                {{-- <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Apply Promo Code</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter promo code">
                            <button class="btn btn-outline-secondary" type="button">Apply</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script-js')
<script>
    $(document).ready(function() {
        // Responsive: Ensure cart labels and items stack nicely on all screens
        $('.cart-item .card-title, .cart-item .price, .cart-item .total').addClass('text-truncate');

        // Helper to extract price as number from formatted string
        function extractPrice(priceText) {
            // Remove any non-digit except dot and comma, then parse
            return parseFloat(priceText.replace(/[^\d.]/g, ''));
        }

        // Update total for a single cart item
        function updateTotal(element) {
            var $cartItem = $(element).closest('.cart-item');
            var price = extractPrice($cartItem.find('.price').text());
            var qty = parseInt($cartItem.find('.quantity-input').val());
            $cartItem.find('.total').text('Total : ' + (price * qty).toLocaleString() + ' mmk');
        }

        // Update subtotal and final total for all cart items
        function updateSubtotal() {
            var subtotal = 0;
            $('.cart-item').each(function() {
                var price = extractPrice($(this).find('.price').text());
                var qty = parseInt($(this).find('.quantity-input').val());
                subtotal += price * qty;
            });
            $('#cart-subtotal').text(subtotal.toLocaleString() + ' mmk');
        }

        // Initialize totals and subtotal on page load
        $('.cart-item').each(function() {
            var price = extractPrice($(this).find('.price').text());
            var qty = parseInt($(this).find('.quantity-input').val());
            $(this).find('.total').text('Total : ' + (price * qty).toLocaleString() + ' mmk');
        });
        updateSubtotal();

        // Plus button
        $('.quantity').on('click', '.btn-plus', function() {
            var $input = $(this).siblings('input');
            $input.val(parseInt($input.val()) + 1);
            updateTotal(this);
            updateSubtotal();
        });

        // Minus button
        $('.quantity').on('click', '.btn-minus', function() {
            var $input = $(this).siblings('input');
            var val = parseInt($input.val());
            if (val > 1) {
                $input.val(val - 1);
                updateTotal(this);
                updateSubtotal();
            }
        });

        // Collect cart data function (now includes description)
        function collectCartData() {
            var cartData = [];
            $('.cart-item').each(function() {
                var $item = $(this);
                var user_id = {{ Auth::user()->id }};
                var product_id = $item.data('product-id');
                var qty = parseInt($item.find('.quantity-input').val());
                var price = extractPrice($item.find('.price').text());
                var total = price * qty;
                var name = $item.find('.card-title').text().trim();
                var description = $('textarea[name="description"]').val();

                cartData.push({
                    user_id: user_id,
                    product_id: product_id,
                    name: name,
                    price: price,
                    description: description,
                    quantity: qty,
                    total: total
                });
            });
            return cartData;
        }

        // Add event listener for description input to remove error on input
        $('#description').on('input', function() {
            if ($(this).val().trim() !== '') {
                $(this).removeClass('is-invalid');
                $('.description-error').hide();
            }
        });

        $('#checkout-btn').click(function(e) {
            e.preventDefault();

            // Check description
            var description = $('#description').val().trim();
            if (!description) {
                $('#description').addClass('is-invalid');
                $('.description-error').show();
                return false;
            }

            var cartData = collectCartData();

            $.ajax({
                url: '{{ route('api.sale.store') }}',
                type: 'POST',
                data: JSON.stringify({
                    cart: cartData,

                }),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Checkout Successful!',
                        text: 'Your order has been placed.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function(xhr) {
                    let res = xhr.responseJSON;
                    Swal.fire('Error', res.message || 'Something went wrong!', 'error');
                }
            });
        });
    });
</script>
@endsection
