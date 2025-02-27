@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="add-about-box">
          
            
            <div class="add-about">
                <h5>Create a New About Section</h5>
            </div>
            <form method="POST" action="{{ route('dashboard.about.store') }}" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

              <div class="row">
                <div class="col-lg-12">
                      <!-- Title -->
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="col-lg-6">
                      <!-- Active Status -->
                <div class="form-group">
                    <label for="active">Status:</label>
                    <select class="form-control" id="active" name="active" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                </div>
              </div>
            
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"  required></textarea>
                </div>

              

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Create About</button>
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
