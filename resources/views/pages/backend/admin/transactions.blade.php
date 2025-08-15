@extends('layouts.app-admin')
@section('title', 'Transactions')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    @if($user->role === 'general')
        @include('pages.backend.admin.my-transactions')
    @else
        @include('pages.backend.admin.all-transactions')
    @endif

</div>
@include('partials.backend.admin.designed-by')
<div class="content-backdrop fade"></div>
@endsection
