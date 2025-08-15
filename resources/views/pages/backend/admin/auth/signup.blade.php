@extends('layouts.auth')
@section('title', 'Create Account')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow">
                        <div class="card-body">

                            {{-- Success Message --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Form Starts --}}
                            <form action="{{ route('register') }}" method="POST" class="pt-2">
                                @csrf

                                <div class="text-center mb-4">
                                    <img src="{{ asset('assets/img/wiremit-logo.png') }}" alt="Tinotenda Mangadza"
                                        style="max-height: 80px;">
                                </div>

                                <h3 class="text-center mb-4">CREATE ACCOUNT</h3>

                                <div class="mb-3">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Your Name" value="{{ old('name') }}" required
                                        autocomplete="given-name">
                                </div>

                                <div class="mb-3">
                                    <label for="surname" class="form-label">Surname</label>
                                    <input type="text" id="surname" name="surname" class="form-control"
                                        placeholder="Your Surname" value="{{ old('surname') }}" required
                                        autocomplete="family-name">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="example@email.com" value="{{ old('email') }}" required
                                        autocomplete="email">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" id="phone" name="phone_number" class="form-control"
                                        placeholder="0779xxxxxxx" value="{{ old('phone') }}" required autocomplete="tel">
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="••••••••" required autocomplete="new-password">
                                        <span class="input-group-text cursor-pointer" id="toggle-password"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-info">Create Account</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="{{ route('forgot') }}" class="d-block mb-2">Forgot Password?</a>
                                    <span>Already have an account?</span>
                                    <a href="{{ route('login') }}">Login</a>
                                </div>
                            </form>
                            {{-- Form Ends --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="content-backdrop fade"></div>

@endsection
