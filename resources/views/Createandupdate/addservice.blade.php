@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="add-service-box">
          
            <div class="add-faq">
                <h5>Create a New Service</h5>
                <a href="/dashboard/service/create"><button>Add New Category</button></a>
            </div>
            {{-- action="{{ route('service.store') }}" --}}
            <form  method="POST" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

                <!-- Service Name -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="service">Service Name:</label>
                            <input type="text" class="form-control" id="service" name="service" value="{{ old('service') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Value1">Value 1</option>
                                <option value="Value2">Value 2</option>
                                <option value="Value3">Value 3</option>
                                <option value="Value4">Value 4</option>
                                <option value="Value5">Value 5</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>

                    <!-- Active/InActive Status -->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="status">Active / Inactive</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Create Service</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
