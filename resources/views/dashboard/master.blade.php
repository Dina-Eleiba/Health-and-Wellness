<!DOCTYPE html>
<html lang="en">
@include('dashboard.partials.header')

<body>
    <div class="container-scroller">
      
        <!-- partial:partials/_navbar.html -->
        @include('dashboard.partials.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('dashboard.partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('dashboard.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('dashboard.partials.scripts')
</body>

</html>
