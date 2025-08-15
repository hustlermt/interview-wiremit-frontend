@extends('layouts.auth')
@section('title', 'Reset Password')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success w-100 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger w-100">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="d-flex align-items-center justify-content-center min-vh-100">

                    {{-- Login Form --}}
                    <form action="{{ route('reset') }}" method="POST" class="w-px-400 border rounded p-3 p-md-5">
                        @csrf

                        {{-- Hidden Fields for Email and Token --}}
                        <input type="hidden" name="email" value="{{ request('email') }}">
                        <input type="hidden" name="token" value="{{ request('token') }}">

                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/wiremit-logo.png') }}" alt="Tinotenda Mangadza"
                                style="max-height: 60px;">
                        </div>

                        <h3 class="mb-4 text-center">Reset Password</h3>

                        <div class="mb-3 form-password-toggle">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="••••••••" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer" id="toggle-password">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" name="password_confirmation" class="form-control"
                                    placeholder="••••••••" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer" id="toggle-password">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-info btn-block" type="submit">Create New Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
