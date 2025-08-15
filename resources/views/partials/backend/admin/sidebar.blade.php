<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('login') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">
                <img src="{{ asset('assets/img/wiremit-logo.png') }}" alt="Wiremit Logo">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <!-- Sidebar navigation -->
    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('admin') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->role === 'general')
            <li class="menu-header small text-uppercase">Send Money</li>

            <li class="menu-item">
                <a href="{{ route('page.send.money') }}" class="menu-link">
                    <i class="menu-icon bx bx-money"></i>
                    <div>Send Money</div>
                </a>
            </li>
        @else
            <li class="menu-header small text-uppercase">Adverts</li>

            <li class="menu-item">
                <a href="{{ route('adverts') }}" class="menu-link">
                    <i class="menu-icon bx bx-package"></i>
                    <div>Adverts</div>
                </a>
            </li>
        @endif

        <!-- Payments -->
        <li class="menu-header small text-uppercase">Payments</li>

        <li class="menu-item">
            <a href="{{ route('page.payments') }}" class="menu-link">
                <i class="menu-icon bx bx-credit-card"></i>
                <div>Transaction History</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">Sign Out</li>

        <li class="menu-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="menu-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon bx bx-power-off"></i>
                <div>Logout</div>
            </a>
        </li>


    </ul>





</aside>
<!-- / Menu -->
