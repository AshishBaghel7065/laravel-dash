@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-seo-box">
            <div class="add-faq">
                <h5>Update SEO Metadata</h5>
                <a href="/dashboard/seo"><button>Back to SEO Pages</button></a>
            </div>

            <form method="POST" action="{{ route('dashboard.seopages.update', $seoPage->id) }}" class="add-form">
                @csrf <!-- CSRF Token -->
                @method('PUT') <!-- PUT method for updating data -->

                <div class="row">
                    <!-- Page Name -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="seopage">Page:</label>
                            <input type="text" class="form-control text-secondary" id="seopage" name="seopage" value="{{ old('seopage', $seoPage->seopage) }}" required readonly>
                        </div>
                    </div>

                    <!-- Author -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $seoPage->author) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Website Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $seoPage->title) }}" required>
                </div>

                <!-- Meta Description -->
                <div class="form-group">
                    <label for="meta_description">Meta Description:</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3" required>{{ old('meta_description', $seoPage->meta_description) }}</textarea>
                </div>

                <!-- Meta Keywords -->
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords:</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $seoPage->meta_keywords) }}" required>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update Metadata</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
