@extends('layouts.app-admin')
@section('title', 'My Payments')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="mb-4">My Payments</h4>

    <table id="usersTable" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
                <th># ID</th>
                <th>Date</th>
                <th>Amount $</th>
                <th>Customer Name</th>
                <th>Recipient Email</th>                            
           
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $txn)
            <tr>
                <td>{{ $txn->id }}</td>
                <td>{{ $txn->created_at->format('d M Y') }}</td>
                <td>{{ number_format($txn->amount_usd, 2) }}</td>
                <td>{{ $txn->recipient_name }}</td>
                <td>{{ $txn->recipient_email ?? '-' }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
