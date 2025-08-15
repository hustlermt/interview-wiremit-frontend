@extends('layouts.app-admin')
@section('title', 'Update Advert')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
            <h4 class="mb-0">UPDATE ADVERT</h4>

        </div>
        <div class="card">

            <div class="card-body">
                <form class="card-body" action="{{ route('admin.adverts.update', $advert->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row g-3">

                        <!-- Advert Image -->
                        <div class="col-md-12">
                            <label class="form-label">Advert Image</label>
                            @if ($advert->advert_image)
                                <div class="mb-2">
                                    <img src="{{ asset($advert->advert_image) }}" alt="Current Image"
                                        style="max-height:80px;">
                                </div>
                            @endif
                            <input type="file" name="advert_image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave blank to keep existing image</small>
                        </div>

                        <!-- Advert Title -->
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $advert->title) }}" required>
                        </div>

                        <!-- Advert URL -->
                        <div class="col-md-12">
                            <label class="form-label">URL (Optional)</label>
                            <input type="url" name="url" class="form-control" value="{{ old('url', $advert->url) }}"
                                placeholder="https://example.com/....">
                        </div>

                    </div>

                    <div class="pt-4 mt-3 text-center">
                        <button type="submit" class="btn btn-info w-50">Update Advert</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <!-- / Content -->

    <!-- Footer -->
    @include('partials.backend.admin.designed-by')
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>

@endsection
