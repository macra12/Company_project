@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Create New Feature</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('features.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title Input -->
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">
                                    <i class="bi bi-pencil-square me-2"></i>Title
                                </label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter feature title" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Input -->
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">
                                    <i class="bi bi-image me-2"></i>Image
                                </label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-2"></i>Create
                                </button>
                                <a href="{{ route('services') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
