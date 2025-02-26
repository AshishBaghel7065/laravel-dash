@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="add-blog-box">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="add-faq">
                <h5>Create a New Blog Post</h5>
                <a href="/dashboard/blog/category/create"><button>Add Blog Category</button></a>
            </div>

            <form method="POST" action="{{ route('dashboard.blog.store') }}" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

                <!-- Blog Title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="title">Blog Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="slug">Slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug"  required>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                @foreach ($Blogcategories as $category)
                                <option value="{{ strtolower($category->title) }}">{{ ucwords($category->title) }}</option>
                            @endforeach
                            
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
                            <label for="active">Active / Inactive</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                 <!-- Publish Date -->
                 <div class="row">
                  
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="meta_tags">Meta Tags</label>
                            <input type="text" class="form-control" id="meta_tags" name="meta_tags" placeholder="Comma-separated tags (e.g., tag1, tag2, tag3)">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="publish">Publish At:</label>
                            <input type="date" class="form-control" id="publish" name="publish" required>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>

                            </textarea>
                        </div>
                    </div>
                </div>

                <!-- Meta Keywords -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords:</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta keywords">
                        </div>
                    </div>
                </div>

                <!-- Meta Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="meta_description">Meta Description:</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter the Meta Description" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Slug -->
                <div class="row">
                
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Create Blog Post</button>
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
            placeholder: 'Enter blog description here...',
            tabsize: 2,
            callbacks: {
                onInit: function() {
                    // Change background color after initialization
                    $('.note-editable').css('background-color', 'white');
                }
            }
        });
    });


    document.getElementById('meta_tags').addEventListener('change', function() {
    let metaTags = this.value.trim(); // Get the input value
    if (metaTags) {
        // Convert the string to an array and remove extra spaces from each tag
        let tagsArray = metaTags.split(',').map(tag => tag.trim());

        // Update the input value with cleaned, comma-separated tags
        this.value = tagsArray.join(', ');
    }
});

</script>

@endsection
