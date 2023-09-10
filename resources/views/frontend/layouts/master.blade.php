<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.inc.head')

<body>
    <!-- Topbar Start -->
    @include('frontend.layouts.inc.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('frontend.layouts.inc.navbar')
    <!-- Navbar End -->


   @yield('content')

    <!-- Footer Start -->
    @include('frontend.layouts.inc.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('frontend.layouts.inc.script')
</body>

</html>
