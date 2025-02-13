@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-service-box">
            <h5>Update Service</h5>
            {{-- action="{{ route('service.update', $service->id) }}" --}}
            <form  method="POST" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->
                @method('PUT') <!-- This is required for PUT requests -->
                
                <!-- Service Name -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="service">Service Name:</label>
                            {{-- value="{{ old('service', $service->service) }}" --}}
                            <input type="text" class="form-control" id="service" name="service"  required>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                {{-- <option value="Value1" {{ $service->category == 'Value1' ? 'selected' : '' }}>Value 1</option>
                                <option value="Value2" {{ $service->category == 'Value2' ? 'selected' : '' }}>Value 2</option>
                                <option value="Value3" {{ $service->category == 'Value3' ? 'selected' : '' }}>Value 3</option>
                                <option value="Value4" {{ $service->category == 'Value4' ? 'selected' : '' }}>Value 4</option>
                                <option value="Value5" {{ $service->category == 'Value5' ? 'selected' : '' }}>Value 5</option> --}}
                            </select>
                        </div>
                    </div>

                    <!-- Image URL -->
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            {{-- @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" width="100" />
                            @endif --}}
                        </div>
                    </div>

                    <!-- Active/InActive Status -->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="status">Active / Inactive</label>
                            <select class="form-control" id="status" name="status" required>
                                {{-- <option value="active" {{ $service->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option> --}}
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            {{-- {{ old('description', $service->description) }} --}}
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update Service</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
