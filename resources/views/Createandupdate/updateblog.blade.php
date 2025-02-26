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
                <h5>Update Blog Post</h5>
            </div>

            <form method="POST" action="{{ route('dashboard.blog.update', $blog->id) }}" enctype="multipart/form-data" class="add-form">
                @csrf
                @method('PUT') <!-- HTTP method spoofing for updating -->

                <!-- Blog Title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="title">Blog Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="slug">Slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $blog->slug }}" required>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Web Development" {{ $blog->category == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                <option value="Mobile Development" {{ $blog->category == 'Mobile Development' ? 'selected' : '' }}>Mobile Development</option>
                                <option value="Cloud Computing" {{ $blog->category == 'Cloud Computing' ? 'selected' : '' }}>Cloud Computing</option>
                                <option value="Data Science" {{ $blog->category == 'Data Science' ? 'selected' : '' }}>Data Science</option>
                                <option value="Cybersecurity" {{ $blog->category == 'Cybersecurity' ? 'selected' : '' }}>Cybersecurity</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="publish">Publish At:</label>
                            <input type="date" class="form-control" id="publish" name="publish" value="{{ old('publish', $blog->publish) }}" required>
                        </div>
                    </div>
                    <!-- Active/InActive Status -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="active">Active / Inactive</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1" {{ $blog->active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $blog->active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Publish Date -->
                <div class="row">
                   
                    <div class="col-lg-7">
                        <div class="form-group">
                            <label for="seo_tags">SEO Tags:</label>
                            <input type="text" class="form-control" id="meta_tags" name="meta_tags" placeholder="Comma-separated tags">
                        </div>
                        <div class="my-3">
                            <h6>Prev Tag</h6>
                            <div>
                                @php
                                $tags = explode(',', $blog->meta_tags);
                            @endphp
                            
                            @foreach($tags as $tag)
                                <button class="meta-tags bg-white">{{ $tag }}</button>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($blog->image)
                                <small>Current Image: <img src="{{ asset('/storage/'.$blog->image) }}" width="200" class="my-2" target="_blank" alt="blog imag"></small>
                            @endif
                        </div>
                    </div>
                   
                </div>

                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>{{ $blog->description }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Meta Keywords -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords:</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $blog->meta_keywords }}" placeholder="Meta keywords">
                        </div>
                    </div>
                </div>

                <!-- Meta Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="meta_description">Meta Description:</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" required>{{ $blog->meta_description }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update Blog Post</button>
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
            placeholder: 'Edit your blog description here...',
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
