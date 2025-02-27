@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="add-review-box">
            <div class="add-faq">
                <h5>Create a New Review</h5>
            </div>
            
            <form method="POST" action="{{ route('dashboard.review.store') }}" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

                <!-- Username -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="posted_date">Posted Date:</label>
                            <input type="date" class="form-control" id="posted_date" name="posted_date" value="{{ old('posted_date') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="stars">Rating (1-5):</label>
                            <select class="form-control" id="stars" name="stars" required>
                                <option value="1" {{ old('stars') == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('stars') == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('stars') == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('stars') == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('stars') == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Posted Date -->
                <div class="row">
                    <!-- Image -->
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="user_image">Image:</label>
                            <input type="file" class="form-control" id="user_image" name="user_image" required>
                        </div>
                    </div>

                </div>

                <!-- Review Text -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="review">Review:</label>
                            <textarea class="form-control" id="review" name="review" rows="5" required>{{ old('review') }}</textarea>
                        </div>
                        
                    </div>
                </div>

                <!-- Star Rating -->
                <div class="row">
                   
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Create Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
