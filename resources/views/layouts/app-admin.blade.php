<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets/') }}" 
    data-template="vertical-menu-template-no-customizer-starter">

<head>
    @include('partials.backend.admin.head')
</head>

<body>
    {{-- i will use this section if i want to use a custom layout instead of applying access control --}}

    {{-- @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Request;

        $user = Auth::user();
        $isAdminRoute = Str::startsWith(Request::path(), 'admin');

        if ($isAdminRoute && (!$user || $user->role !== 'admin')) {
            abort(404);
        }
    @endphp --}}

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('partials.backend.admin.sidebar')

            <div class="layout-page">
                @include('partials.backend.admin.navbar')

                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    @include('partials.backend.admin.footer')
</body>

</html>
