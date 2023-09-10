<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.inc.head')
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('backend.layouts.inc.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('backend.layouts.inc.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('backend.layouts.inc.navber')
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100  mx-0">


                    @yield('content')


                </div>
            </div>
            <!-- Blank End -->


            <!-- Footer Start -->
            @include('backend.layouts.inc.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->



        <!-- toastr End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
@include('backend.layouts.inc.script')
</body>

</html>
