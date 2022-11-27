<!DOCTYPE html>
<html lang="en">

<x-layout.partials.head/>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex">
                    
                    <div class="navbar-brand py-0 my-0 mx-4">
                        <h1 class="mb-0 pt-4 text-primary" style="height: 100%; font-weight: normal">TOKO<span style="font-weight: bold">PAIMON</span></h1>
                    </div>
                    <!-- Sidebar Toggle (Topbar) -->
                    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-3 sm:block">
                                @auth
                                <form action="{{ route('do-logout') }}" method="POST">
                                    @csrf

                                    <button type="submit"  class="text-sm btn btn-outline-primary">Logout</button>
                                </form>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm btn btn-outline-primary">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-sm btn btn-outline-primary">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">
                {{$slot}}
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="font-size: 14px">Copyright &copy; WireShark 2.0 - 2022</span>
                    </div>
                </div>
            </footer>
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

<x-layout.partials.script/>
</body>

</html>