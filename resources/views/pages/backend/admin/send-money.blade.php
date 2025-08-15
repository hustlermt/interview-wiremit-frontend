@extends('layouts.app-admin')
@section('title', 'Send Money')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <h4 class="mb-0">SEND MONEY</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <h6>Send Money</h6>
                <form id="send-money-form" action="{{ route('send.money') }}" method="POST">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @csrf
                    <div class="row g-3">

                        <!-- Recipient Country -->
                        <div class="col-md-6">
                            <label class="form-label" for="recipient-country">Recipient Country</label>
                            <select id="recipient-country" name="recipient_country" class="form-select" required>
                                <option value="">Select</option>
                                <option value="GBP">United Kingdom (GBP)</option>
                                <option value="ZAR">South Africa (ZAR)</option>
                            </select>
                            <small class="text-danger" id="country-error"></small>
                        </div>

                        <!-- Recipient Name -->
                        <div class="col-md-6">
                            <label class="form-label" for="recipient-name">Recipient Name</label>
                            <input type="text" id="recipient-name" name="recipient_name" class="form-control" required>
                        </div>

                        <!-- Recipient Email -->
                        <div class="col-md-6">
                            <label class="form-label" for="recipient-email">Recipient Email (Optional)</label>
                            <input type="email" id="recipient-email" name="recipient_email" class="form-control">
                            <small class="text-danger" id="email-error"></small>
                        </div>

                        <!-- Account Number -->
                        <div class="col-md-6">
                            <label class="form-label" for="account-number">Account Number</label>
                            <input type="text" id="account-number" name="account_number" class="form-control" required
                                maxlength="10" minlength="10" pattern="\d{10}">
                            <small class="text-danger" id="account-error"></small>
                        
                        </div>

                        <!-- Amount in USD -->
                        <div class="col-md-6">
                            <label class="form-label" for="amount-usd">Amount in USD</label>
                            <input type="number" id="amount-usd" name="amount_usd" class="form-control" min="5" max="500"
                                required>
                            <small class="text-danger" id="amount-error"></small>
                        </div>

                        <!-- Transaction Fee -->
                        <div class="col-md-6">
                            <label class="form-label" for="transaction-fee">Transaction Fee</label>
                            <input type="text" id="transaction-fee" name="transaction_fee" class="form-control" readonly>
                        </div>

                        <!-- Final Amount -->
                        <div class="col-md-6">
                            <label class="form-label" for="final-amount">Recipient to Receive ( <span id="final-amount-display"></span> ) </label>
                            <input type="text" id="final-amount" name="final_amount" class="form-control" readonly>
                            <span id="final-amount-display"></span>
                        </div>

                        <!-- Payment Method -->
                        <div class="col-md-6">
                            <label class="form-label" for="payment-method">Payment Method</label>
                            <select id="payment-method" name="payment_method" class="form-select" required>
                                <option value="">Select</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="mobile">Mobile Money</option>
                                <option value="card">Card Payment</option>
                            </select>
                        </div>

                    </div>

                    <div class="pt-4 mt-3 text-center">
                        <button type="submit" class="btn btn-warning w-50">Send Money</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('partials.backend.admin.designed-by')
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>

@endsection
