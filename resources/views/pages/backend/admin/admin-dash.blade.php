 <div class="row g-4 mb-4">
     <div class="col-sm-6 col-xl-3">
         <div class="card">
             <div class="card-body">
                 <div class="d-flex align-items-start justify-content-between">
                     <div class="content-left">
                         <span>Today's Payments</span>
                         <div class="d-flex align-items-end mt-2">
                             <h4 class="mb-0 me-2">{{ number_format($stats['today_usd'] ?? 0, 2) }} USD</h4>
                         </div>
                     </div>
                     <span class="badge bg-label-info rounded p-2">
                         <i class="bx bx-credit-card bx-sm"></i>
                     </span>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-xl-3">
         <div class="card">
             <div class="card-body">
                 <div class="d-flex align-items-start justify-content-between">
                     <div class="content-left">
                         <span>All Users</span>
                         <div class="d-flex align-items-end mt-2">
                             <h4 class="mb-0 me-2">{{ $stats['users_count'] ?? '-' }}</h4>

                         </div>

                     </div>
                     <span class="badge bg-label-success rounded p-2">
                         <i class="bx bx-user-plus bx-sm"></i>
                     </span>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-xl-3">
         <div class="card">
             <div class="card-body">
                 <div class="d-flex align-items-start justify-content-between">
                     <div class="content-left">
                         <span>Active Adverts</span>
                         <div class="d-flex align-items-end mt-2">
                             <h4 class="mb-0 me-2">{{ $stats['adverts_count'] ?? 0 }}</h4>

                         </div>
                     </div>
                     <span class="badge bg-label-success rounded p-2">
                         <i class="bx bx-food-menu bx-sm"></i>
                     </span>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-sm-6 col-xl-3">
         <div class="card">
             <div class="card-body">
                 <div class="d-flex align-items-start justify-content-between">
                     <div class="content-left">
                         <span>All Transactions</span>
                         <div class="d-flex align-items-end mt-2">
                             <h4 class="mb-0 me-2">{{ $stats['tx_count'] ?? 0 }}</h4>

                         </div>

                     </div>
                     <span class="badge bg-label-info rounded p-2">
                         <i class="bx bx-food-menu bx-sm"></i>
                     </span>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Users List Table -->


 <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
     <h4 class="mb-0">Transactions</h4>
 </div>
 <div class="card">
     <div class="card-body">
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
                 @foreach ($transactions as $txn)
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

 </div>
