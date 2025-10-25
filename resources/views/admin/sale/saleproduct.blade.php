@extends('layouts.master')
@section('content')

    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between my-2">
            <div class="mb-2">
                <form action="{{ route('saleProductView') }}" method="get">
                    <div class="input-group">
                        <input type="text" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                            placeholder="Enter Search Key...">
                        <button type="submit" class=" btn bg-dark text-white"> <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

            </div>
            <div class="mb-2">
                <div class="">
                    <button class=" btn btn-secondary rounded shadow-sm mb-2"> <i class="fa-solid fa-database"></i>
                        Product Count ( {{ count($product) }} ) </button>
                    <a href="{{ route('saleProductView') }}" class=" btn btn-outline-primary  rounded shadow-sm mb-2">
                        All Products</a>
                </div>
            </div>
            <div class="mb-2">
                <form action='{{ route('cartView') }}' method="get">
                    <button type="submit" class="btn btn-primary position-relative">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ is_countable($cart) ? count($cart) : 0 }}
                        </span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover shadow-sm rounded overflow-hidden">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($product) != 0)
                                @foreach ($product as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/' . $item->image) }}"
                                                class="img-thumbnail rounded shadow-sm w-100"
                                                style="max-width:60px; height:auto;" alt="">
                                        </td>
                                        <td>
                                            <span class="d-block" style="max-width:130px;">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block" style="max-width:300px;">{{ $item->description }}</span>
                                        </td>
                                        <td class="col-2">
                                            @if ($item->stock == 0)
                                                <span class="d-block text-danger">Out of Stock</span>
                                            @else
                                                <div class="position-relative d-inline-block w-50">
                                                    <span class="d-block">{{ $item->stock }}</span>
                                                    @if ($item->stock <= 3)
                                                        <span class="badge rounded-pill bg-danger text-white d-inline-block mt-1" style="font-size:0.85rem;">
                                                            Low amt stock
                                                        </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="d-block" style="max-width:80px;">{{ $item->price }} MMK</span>
                                        </td>
                                        <td>
                                            <form action="{{ route('addCart') }}" method='post' class="d-flex flex-row flex-wrap justify-content-center">
                                                @csrf
                                                <input type='hidden' name="userid" value="{{ Auth::user()->id }}">
                                                <input type='hidden' name="productid" value="{{ $item->id }}">
                                                <button type='submit'
                                                    class="btn btn-sm btn-outline-danger py-2"
                                                    style="min-width:30px;"
                                                    @if($item->stock == 0) disabled @endif>
                                                    <i class="fa-solid fa-cart-plus"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-muted text-center">There is no products</h5>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center justify-content-sm-end align-items-center mt-3">
                        <span class="">{{ $product->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
