@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column flex-sm-row justify-content-between my-2">
            <div class="d-flex flex-wrap gap-2 mb-2 mb-sm-0">
                <button class="btn btn-secondary rounded shadow-sm m-2">
                    <i class="fa-solid fa-database"></i>
                    Product Count ({{ count($product) }})
                </button>
                <a href="{{ route('productListView') }}" class="btn btn-outline-primary rounded shadow-sm m-2">
                    All Products
                </a>
                <a href="{{ route('productListView', 'lowAmt') }}" class="btn btn-outline-danger rounded shadow-sm m-2">
                    Low Stock List
                </a>
            </div>
            <div class="w-sm-50 w-md-25 m-2">
                <form action="{{ route('productListView') }}" method="get">
                    <div class="input-group">
                        <input type="text" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                            placeholder="Enter Search Key...">
                        <button type="submit" class="btn bg-dark text-white">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover shadow-sm rounded overflow-hidden">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($product) != 0)
                                @foreach ($product as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/' . $item->image) }}"
                                                class="img-thumbnail rounded shadow-sm" style="width:80px; max-width:100%; height:auto;" alt="">
                                        </td>
                                        <td>
                                            <span class="d-block" style="max-width:100px;">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block" style="max-width:150px;">{{ $item->price }} MMK</span>
                                        </td>
                                        <td class="col-2">
                                            <p class="mb-0">
                                                @if ($item->stock == 0)
                                                    <span class="d-block text-danger">Out of Stock</span>
                                                @else
                                                    <span class="d-block text-bold">{{ $item->stock }}</span>
                                                    @if ($item->stock <= 3)
                                                        <span class="badge rounded-pill bg-danger text-white d-inline-block ms-2 mt-1" style="font-size:0.85rem;">
                                                            Low amt stock
                                                        </span>
                                                    @endif
                                                @endif
                                            </p>
                                        </td>
                                        <td>
                                            <span class="d-block text-truncate" style="max-width:100px;">{{ $item->category_name }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row flex-nowrap" style="gap: 0.75rem;">
                                                <a href="{{ route('productEditView', $item->id) }}"
                                                    class="btn btn-sm btn-outline-secondary mb-1">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger mb-1" type='button'
                                                    onclick="confirmDelete({{ $item->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
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
                </div>
                <div class="d-flex justify-content-end">
                    <span class="">{{ $product->links() }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sweet-alert')
    <script>
        function confirmDelete($id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    setInterval(() => {
                        location.href = "/admin/product/delete/" + $id;
                    }, 2000);
                }
            });
        }
    </script>
@endsection
