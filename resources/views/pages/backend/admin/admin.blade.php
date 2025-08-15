@extends('layouts.app-admin')
@section('title', 'Administrator')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (Auth::user()->role === 'admin')
            @include('pages.backend.admin.admin-dash', [
                'transactions' => $transactions,
                'stats' => $stats,
            ])
        @else
            @include('pages.backend.admin.user-dash', ['transactions' => $transactions, 'stats' => $stats])
        @endif
    </div>

    @include('partials.backend.admin.designed-by')
    <div class="content-backdrop fade"></div>
@endsection
