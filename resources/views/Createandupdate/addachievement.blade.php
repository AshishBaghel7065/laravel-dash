@extends('layouts.dashboard')

@section('content')

<div class="main-content">
    <div class="container mt-4">

        <div class="add-achievement-box">
            <h5>Add Achievement</h5>
            <form action="{{ route('dashboard.achievement.store') }}" method="POST" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

                <!-- Achievement Title -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="count">Count:</label>
                            <input type="number" class="form-control" id="count" name="count" max="9999999999" required lenth>
                        </div>
                    </div>
                </div>

              
                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Submit Achievement</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
