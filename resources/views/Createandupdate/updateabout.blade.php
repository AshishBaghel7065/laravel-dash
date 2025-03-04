@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-about-box">
            <h5>Update About Section</h5>
            <form method="POST" enctype="multipart/form-data" class="add-form" action="{{ route('dashboard.about.update', $updateAbout->id ?? '') }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $updateAbout->title) }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                          @if ($updateAbout->image)
    <img src="{{ asset('updateabout/' . $updateAbout->image) }}" alt="Current Image" width="100" class="my-3" />
@endif

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="active">Active / Inactive</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1" {{ $updateAbout->active == true ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $updateAbout->active == false ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

            
                <!-- Description with Summernote -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $updateAbout->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Active Status -->
                <div class="row">
                  
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update About</button>
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
            placeholder: 'Enter description here...',
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
