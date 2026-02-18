<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sale Admin - Dashboard</title>

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('saleProductView') }}">
                <div class="sidebar-brand-icon company-logo">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEU0lEQVR4nO2aeahVVRTGf74GK3NKLMX+UaEeqSW+pHJCokQh1KIIXgkiRvVQyMghLBVzDgtKTMuyVxYmBA2kUIo2EDQKzgppoUQ8HJrTcogF34bF4Xjvmd59V7gfbHj77X322d/ea39rrX0u1FBDDVlxKTAAaMhR+mR4b2egHQVhHPArcK6Ash3olfC91wG/AW8A9wLd8+6EkWgBlgNLcpS1ItOc4L2PA2cji7A6D5F6DbKMYvADsDOBOZ0CDgATgPtUeuR5cT8ReUb1acC3KcuXwGA9v0elFK7VO98FLsoz+VJE5mpV05S9wPAURAzb9N4/gcPAUqCuSCJ5kZRIJ2A+sFEmZnN4pEgilwAPAjMTlunAsAxEPLprDm8XSWRFBsk19RmZgkiddmO1ymcaZ0aRROzw/gLckbA06fknUxDpCvzuFuI/+ZLL1D4KWJWXyHfAoRTPN+j52Y7IMeDOMs/ZpLsBn8qUkYLN1fM25glJ+ZWV2JFHY3YkrPQX8lNJ0aTnfgQ+UXlL5zY1kRcynpERjojJ6SsymYMxE7kauD1mLhs0lu1UakSJXAw0plCtJ4Db3Hj+jCzX2P1d+w3AFuA08KxULwSNT6v/JmAx8EAa39KafmS2xr5ZdfP+f0d28x+3A1cA70VisOY8RKJhdZp6KSKvqj5OIX8foMt5YrHr5f0Tm1qUiEWw77v2qTp8ZnLoLBwH+jpndlSTK0dkpeqTgYExatQeGCQlHAJ8DZyRXKcmMl62GdDgFMnQUyF7B9WN4CKXVJUiUi9JDWbzF3C/G/vlGCF5joSwmGc3MJZiUIoISrosppoD/Az8AVzuFtUEZDNwEhiTZyITpOcBpkgLIiH4i0BH59hWSo2SEPFYq/beMYt7Y5bJD3f2aoO/49oe1sTCGRkKHHEv7ya/cXdCIgsU+v+kth15w/eArlIG89BFIAmRcD+wPkV+nwgNzk57RbbatvkmVzcvfUtEcgdLcZIQMdwKLKSV8aFipIB5yuKCad0V8dY9VZ+Y4YwUis7yE3Ydg3bDnFHAVdoBf+syMmLXI+SV25RIvwqGKBUl0h54SRpvHvvjGHk0hdolD3/A5RNVRWS+6rt0VixK/cb176s7qRPKF1rUZ2C1Edmq0CEc7o/UHlStUfVJqo9VfUq1EXledbumeVNh9n7Xv78CuUOKjfap/9AYIsFz17cFkU5KbM7o//vlZzyanFOz3Zvl2vbI3D5X+1dF3rYnIeLjKWRKRup8qFNUEEyQSM7+L7Ama9qa1Y/Y6n8PjE5x6RBXGkVge4zSVQRLCvo2ElLXcBHRJhimjMwm8xTwmrsxL3cBsV59V7TVTkSxzkntGP39kNqmR7K5aA5jfe+hSrCuBJEWXQb4XP71C5HIUiVZARNdPl11RJo1oS4xREphkrvmqQo85rz6BnfrV+4j6G5JeJbP060Ci3w/yCC5p/N+22gtXJPiRwKDykQANdRQA5XH/yPm6QVAuUITAAAAAElFTkSuQmCC" alt="external-application-pos-terminal-device-others-pike-picture-22">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if(Auth::user()->role == 'Admin')
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->role == 'Admin')
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Product</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="{{ route('productListView')}}">Product List</a>
                        <a class="collapse-item" href=" {{ route('productCreateView')}}">Add Product</a>
                        <a class="collapse-item" href="{{ route('categoryCreateView')}}">Category</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fa-solid fa-user"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUser"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="{{ route('userListView')}}">User List</a>
                        <a class="collapse-item" href="{{ route('userCreateView')}}">Add User</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Sale Management Table -->
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('saleManagementView') }}">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>Store</span></a>
            </li>
            @endif


            <!-- Nav Item - Sale -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('saleProductView') }}">
                    <i class="fa-solid fa-shop"></i>
                    <span>Sales</span></a>
            </li>

            <!-- Nav Item - Traking -->
            @if(Auth::user()->role == 'Admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('saleListView') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Traking</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src=" {{ Auth::user()->image==null ?  asset('images/default.png') : asset('images/'.Auth::user()->image) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('adminProfile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('changePasswordView')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>

                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white py-2 shadow-sm ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Click "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    @yield('sweet-alert')
    @include('sweetalert::alert')
    <script>
        function loadFile(event){
            var reader=new FileReader();
            reader.onload=function(){
                var output=document.getElementById('output');
                output.src=reader.result
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    @yield('script-js')
</html>
