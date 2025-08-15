@extends('layouts.app-admin')
@section('title', 'Adverts')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <h4 class="mb-0">Adverts</h4>
            <a href="{{ route('adverts.add') }}" class="btn btn-info">
                <i class="bx bx-plus me-1"></i> Add Advert
            </a>
        </div>
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card-body">
                <table id="usersTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adverts as $advert)
                            <tr>
                                <!-- Image -->
                                <td>
                                    @if ($advert->advert_image)
                                        <img src="{{ asset($advert->advert_image) }}" alt="Advert Image"
                                            style="max-height:40px;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <!-- Title (truncate to 20 words) -->
                                <td>{{ \Illuminate\Support\Str::words($advert->title, 15, '...') }}</td>

                                <td>
                                    @if ($advert->url)
                                        <a href="{{ $advert->url }}" target="_blank">Visit Page</a>
                                    @else
                                        <span class="text-muted">No Link</span>
                                    @endif
                                </td>

                                <td class="d-flex justify-content-between">
                                    <div class="edit mr-3">
                                        <a href="{{ route('admin.adverts.edit', $advert->id) }}">
                                            <i class="fas fa-edit text-success"></i>
                                        </a>
                                    </div>

                                    <div class="delete">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{ $advert->id }}">
                                            <i class="text-danger fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="modal-delete-{{ $advert->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title text-uppercase">Delete Advert</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <p>Are you sure you want to delete this advert?</p>
                                            <p class="mb-0 text-danger">This action can’t be reversed!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.adverts.delete', $advert->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>

                </table>


            </div>

        </div>
        <!-- / Content -->
    </div>
    <!-- Footer -->
    @include('partials.backend.admin.designed-by')

    <div class="content-backdrop fade"></div>

@endsection
