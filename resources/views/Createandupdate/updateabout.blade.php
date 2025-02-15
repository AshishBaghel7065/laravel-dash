@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-4">
        <div class="update-about-box">
            <h5>Update About Section</h5>
            <form method="POST" enctype="multipart/form-data" class="update-form" action="{{ route('dashboard.about.update', $about->id) }}">
                @csrf
                @method('PUT')
                
                <!-- Title -->
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $about->title) }}" required>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if ($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="Current Image" class="my-3" width="100">
                    @endif
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required>{{ old('description', $about->description) }}</textarea>
                </div>

                <!-- Active Status -->
                <div class="form-group">
                    <label for="active">Active Status:</label>
                    <select class="form-control" id="active" name="active" required>
                        <option value="1" {{ $about->active == true ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $about->active == false ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update About</button>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 300,
            placeholder: 'Enter description here...',
            tabsize: 2
        });
    });
</script>
@endsection
