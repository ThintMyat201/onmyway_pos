@extends('layouts.master')
@section('content')
    <div class="card shadow mb-4 col">
        <div class="card-header py-3">
            <div class="">
                <div class="">
                    <h6 class="m-0 font-weight-bold text-primary">Account Information</h6>
                </div>
            </div>
                <div class="card-body">
                    <div class="row flex-column flex-md-row align-items-center">
                        <div class="col-12 col-md-4 col-lg-3 offset-md-0 offset-lg-1 mb-3 mb-md-0 d-flex justify-content-center">
                            <img class="img-profile img-thumbnail" id="output"
                                src="{{ $userData->image == null ? asset('images/default.png') : asset('images/' . $userData->image) }}"
                                alt="User Image"
                                style="max-width:180px; width:100%; height:auto;">
                        </div>
                        <div class="col-12 col-md-8 col-lg-7">
                            <div class="row g-3 mt-3">
                                <div class="col-5 col-md-3 col-lg-2 h6 ">Name :</div>
                                <div class="col-7 col-md-9 col-lg h6 ">{{ $userData->name }}</div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-5 col-md-3 col-lg-2 h6 ">Email :</div>
                                <div class="col-7 col-md-9 col-lg h6 ">{{ $userData->email }}</div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-5 col-md-3 col-lg-2 h6 ">Phone :</div>
                                <div class="col-7 col-md-9 col-lg h6 ">{{ $userData->phone }}</div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-5 col-md-3 col-lg-2 h6 ">Address :</div>
                                <div class="col-7 col-md-9 col-lg h6 ">{{ $userData->address }}</div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-5 col-md-3 col-lg-2 h6 ">Role :</div>
                                @if ($userData->role === 'Admin')
                                    <div class="col-7 col-md-9 col-lg h6 text-danger ">{{ $userData->role }}</div>
                                @elseif($userData->role === 'User')
                                    <div class="col-7 col-md-9 col-lg h6 text-primary ">{{ $userData->role }}</div>
                                @endif
                            </div>
                            <div class="mt-4 d-flex flex-row flex-wrap" style="gap: 1rem;">
                                <a href="{{ route('userEditView', $userData->id) }}"
                                    class="btn bg-primary text-white btn-sm rounded shadow-sm">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                                </a>
                                <button class="btn bg-danger text-white btn-sm rounded shadow-sm" type='button' onclick="confirmDelete({{$userData->id}})">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                                <a href="{{ route('userListView') }}"
                                    class="btn bg-dark text-white btn-sm rounded shadow-sm">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('sweet-alert')
    <script>
        function confirmDelete($id){
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
                        setInterval(()=>{
                           location.href="/admin/usermanagement/delete/"+$id;
                        },1000);
                    }
                    });
        }
    </script>
@endsection
