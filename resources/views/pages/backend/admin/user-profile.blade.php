@extends('layouts.app-admin')
@section('title', 'User Profile')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Profile</h4>
    <div class="row">
      <!-- User Sidebar -->
      <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
          <div class="card-body">
            <div class="user-avatar-section">
              <div class="d-flex align-items-center flex-column">
                <div class="user-info text-center">
                  <h4 class="mb-2">Tinotenda Mangadza</h4>
                  <span class="badge bg-label-secondary">joined - 23 Feb 2025</span>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-around flex-wrap my-4 py-3">
              <div class="d-flex align-items-start me-4 mt-3 gap-3">
                <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-money bx-sm"></i></span>
                <div>
                  <h5 class="mb-0">$ 125</h5>
                  <span>Amount Spent</span>
                </div>
              </div>
              <div class="d-flex align-items-start mt-3 gap-3">
                <span class="badge bg-label-primary p-2 rounded"><i class="bx bx-car bx-sm"></i></span>
                <div>
                  <h5 class="mb-0">7</h5>
                  <span>All Bookings</span>
                </div>
              </div>
            </div>
            <h5 class="pb-2 border-bottom mb-4">Details</h5>
            <div class="info-container">
              <ul class="list-unstyled">
                <li class="mb-3">
                  <span class="fw-bold me-2">Phone Number:</span>
                  <span>0779013009</span>
                </li>
                <li class="mb-3">
                  <span class="fw-bold me-2">Email:</span>
                  <span>tinotenda@gmail.com</span>
                </li>
                <li class="mb-3">
                  <span class="fw-bold me-2">Status:</span>
                  <span class="badge bg-label-success">Active</span>
                </li>

              </ul>

            </div>
          </div>
        </div>
        <!-- /User Card -->
        
      </div>
      <!--/ User Sidebar -->

      <!-- User Content -->
      <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

        <!-- Recent Devices -->
        <div class="card mb-4">
          <h5 class="card-header">All Bookings</h5>
          <div class="table-responsive">
            <table class="table border-top">
              <thead>
                <tr>
                  <th class="text-truncate">Make and Model</th>
                  <th class="text-truncate">Date</th>
                  <th class="text-truncate">Rental Fee</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-truncate">
                    <i class="bx bx-car text-info me-3"></i>
                    <span class="fw-semibold">Toyota Yaris</span>
                  </td>
                  <td class="text-truncate">12 April 2025</td>
                  <td class="text-truncate">$ 45</td>
                </tr>
                <tr>
                  <td class="text-truncate">
                    <i class="bx bx-car text-info me-3"></i>
                    <span class="fw-semibold">Honda Fit</span>
                  </td>
                  <td class="text-truncate">15 April 2025</td>
                  <td class="text-truncate">$ 35</td>
                </tr>
                <tr>
                  <td class="text-truncate">
                    <i class="bx bx-car text-info me-3"></i>
                    <span class="fw-semibold">Toyota Aqua</span>
                  </td>
                  <td class="text-truncate">22 May 2025</td>
                  <td class="text-truncate">$ 40</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
        <!--/ Recent Devices -->
      </div>
      <!--/ User Content -->
    </div>


  </div>
<!-- / Content -->

<!-- Footer -->
@include('partials.backend.admin.designed-by')
<!-- / Footer -->

<div class="content-backdrop fade"></div>

@endsection
