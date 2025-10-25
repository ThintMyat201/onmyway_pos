@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between my-2">
            <a href="{{ route('userCreateView') }}">
                <button class="btn btn-sm btn-secondary mb-2 mb-md-0">Create</button>
            </a>
            <div class="">
                <form action="" method="get">
                    <div class="input-group">
                        <input type="text" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                            placeholder="Enter Search Key...">
                        <button type="submit" class="btn bg-dark text-white"> <i
                                class="fa-solid fa-magnifying-glass"></i> </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover shadow-sm rounded overflow-hidden">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($userData) != 0)

                                @foreach ($userData as $item)
                                    <tr>
                                        <td>
                                            <span class="d-block text-truncate" style="max-width:60px;">{{ $item->id }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-truncate" style="max-width:120px;">{{ $item->name }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-truncate" style="max-width:160px;">{{ $item->email }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-truncate" style="max-width:80px;">{{ $item->role }}</span>
                                            @if ($item->role === 'Admin')
                                                 <span  class="btn btn-sm bg-danger text-white rounded shadow-sm ms-2"></span>
                                            @elseif($item->role === 'User')
                                                 <span  class="btn btn-sm bg-primary text-white rounded shadow-sm ms-2"></span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="d-block text-truncate" style="max-width:100px;">{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('userDetailView', $item->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach

                            @else
                                <tr>
                                    <td colspan="7">
                                        <h5 class="text-muted text-center">There is no user</h5>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    {{ $userData->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
