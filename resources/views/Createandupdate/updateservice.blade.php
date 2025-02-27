@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-service-box">
            <h5>Update Service</h5>
            <form method="POST" enctype="multipart/form-data" class="add-form" action="{{ route('dashboard.service.update', $service->id) }}">
                @csrf 
                @method('PUT') 
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="service">Service Name:</label>
                            <input type="text" class="form-control" id="service" name="service" value="{{ old('service', $service->service) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="{{ old('service', $service->category) }}">{{ old('service', $service->category) }}</option>
            
                                @foreach ($globalServiceCategories as $category)
                                
                                <option value="{{ strtolower($category->title) }}">{{ ucwords($category->title) }}</option>
                            @endforeach
                            
          
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="image">Image:</label>
                         
                            <input type="file" class="form-control" id="image" name="image">
                               @if ($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" width="100" />
                            @endif
                        </div>
                    </div>

               
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="status">Active / Inactive</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1" {{ $service->active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $service->active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>  
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $service->description) }}</textarea>
                        </div>
                    </div>
                </div>


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
