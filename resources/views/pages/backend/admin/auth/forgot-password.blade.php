@extends('layouts.auth')
@section('title', 'Forgot Password')

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
                    <form action="{{ route('forgot.handle') }}" method="POST" class="w-px-400 border rounded p-3 p-md-5">

                        @csrf

                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/wiremit-logo.png') }}" alt="Tinotenda Mangadza"
                                style="max-height: 80px;">
                        </div>

                        <h3 class="mb-4 text-center">Forgot Password</h3>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="youremail@gmail.com" value="{{ old('email') }}" required autofocus
                                autocomplete="email">
                        </div>


                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-info btn-block" type="submit">Reset Password</button>
                        </div>

                        <div class="mt-4 text-center">
                            
                            <a href="{{ route('login') }}" class="mb-2">Login </a><span>If you have an account!</span><br><br>
                            <span>Don't have an account?</span>
                            <a href="{{ route('signup') }}">Create Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
