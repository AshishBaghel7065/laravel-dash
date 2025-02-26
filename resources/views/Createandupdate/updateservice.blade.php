@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-service-box">
            <h5>Update Service</h5>
            <form method="POST" enctype="multipart/form-data" class="add-form" action="{{ route('dashboard.service.update', $service->id) }}">
                @csrf <!-- CSRF Token for security -->
                @method('PUT') <!-- This is required for PUT requests -->
                
                <!-- Service Name -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="service">Service Name:</label>
                            <input type="text" class="form-control" id="service" name="service" value="{{ old('service', $service->service) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Value1" {{ $service->category == 'Value1' ? 'selected' : '' }}>Value 1</option>
                                <option value="Value2" {{ $service->category == 'Value2' ? 'selected' : '' }}>Value 2</option>
                                <option value="Value3" {{ $service->category == 'Value3' ? 'selected' : '' }}>Value 3</option>
                                <option value="Value4" {{ $service->category == 'Value4' ? 'selected' : '' }}>Value 4</option>
                                <option value="Value5" {{ $service->category == 'Value5' ? 'selected' : '' }}>Value 5</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image URL -->
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="image">Image:</label>
                         
                            <input type="file" class="form-control" id="image" name="image">
                               @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" width="100" />
                            @endif
                        </div>
                    </div>

                    <!-- Active/InActive Status -->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="status">Active / Inactive</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1" >Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>  
                    </div>
                </div>

                <!-- Description with Summernote -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $service->description) }}</textarea>
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

<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 300,
            placeholder: 'Enter service description here...',
            tabsize: 2,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onInit: function() {
                    // Change background color after initialization
                    $('.note-editable').css('background-color', 'white');
                }
            }
        });
    });
</script>
@endsection
