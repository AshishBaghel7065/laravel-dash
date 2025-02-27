@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-review-box">
            <div class="add-faq">
                <h5>Update Review</h5>
             
            </div>
            
            <form method="POST" action="{{ route('dashboard.review.update', $review->id) }}" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->
                @method('PUT') <!-- Method Spoofing for PUT request -->

                <!-- Username -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $review->username) }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="posted_date">Posted Date:</label>
                            <input type="date" class="form-control" id="posted_date" name="posted_date" value="{{ old('posted_date', $review->posted_date) }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="stars">Rating (1-5):</label>
                            <select class="form-control" id="stars" name="stars" required>
                                <option value="1" {{ old('stars', $review->stars) == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('stars', $review->stars) == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('stars', $review->stars) == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('stars', $review->stars) == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('stars', $review->stars) == 5 ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="user_image">Image:</label>
                            <input type="file" class="form-control" id="user_image" name="user_image">
                            @if($review->user_image)
                                <img src="{{ asset('storage/'.$review->user_image) }}" alt="Review Image" width="100" class="mt-2">
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Review Text -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="review">Review:</label>
                            <textarea class="form-control" id="review" name="review" rows="5" required>{{ old('review', $review->review) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
