@extends('layouts.master')
@section('content')

  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h3 class="font-weight-bold text-primary">DataTables</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sessions as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->price }} MMK</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->total }} MMK</td>
                                            <td>
                                                @if($item->created_at->isToday())
                                                    Today
                                                @else
                                                    {{ $item->created_at->format('Y-m-d') }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection

