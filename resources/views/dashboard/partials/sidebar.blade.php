<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/dashboard/images/faces/face1.jpg') }}" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->first_name ." ". Auth::user()->last_name }}</span>
                    <span class="text-secondary text-small">{{ Auth::user()->role}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link " href="{{ route('dashboard.users') }}">
                <span class="menu-title">Users</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="{{ route('dashboard.categories') }}">
                <span class="menu-title">Categories</span>
                <i class=" mdi mdi-folder menu-icon"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="{{ route('dashboard.subcategories') }}">
                <span class="menu-title">Subcategories</span>
                <i class="mdi  mdi-folder-multiple menu-icon"></i>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link " href="{{ route('dashboard.brands') }}">
                <span class="menu-title">Brands</span>
                <i class="mdi mdi-note-text menu-icon"></i>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link " href="{{ route('dashboard.products') }}">
                <span class="menu-title">Products</span>
                <i class="mdi mdi-note-text menu-icon"></i>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('dashboard.posts') }}">
                <span class="menu-title">Posts</span>
                <i class="mdi mdi-note-text menu-icon"></i>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Sub Categories</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li> --}}

    </ul>
</nav>
