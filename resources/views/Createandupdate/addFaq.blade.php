@extends('layouts.dashboard')

@section('content')

<div class="main-content">
    <div class="container mt-4">
        <div class="add-faq-box">
            <h5>Add FAQ</h5>
            <form action="{{ route('dashboard.faq.create') }}" method="POST" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

                <!-- Question -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" id="question" name="question" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="written_by">Written By:</label>
                            <input type="text" class="form-control" id="written_by" name="written_by" required>
                        </div>
                    </div>
                </div>

                <!-- Answer -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="answer">Answer:</label>
                            <textarea class="form-control" id="answer" name="answer" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Written By -->
                <div class="row">
                 
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Submit FAQ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
