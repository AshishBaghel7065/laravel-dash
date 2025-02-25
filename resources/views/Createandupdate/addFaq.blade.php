@extends('layouts.dashboard')

@section('content')

<div class="main-content">
    <div class="container mt-4">
        <div class="edit-faq-box">
            <h5>Add New FAQ</h5>

            <!-- Form to add FAQ -->
            <form action="{{ route('dashboard.faq.create') }}" method="POST">
                @csrf

                <!-- Question -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" class="form-control" id="question" name="question" 
                                   value="{{ old('question') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="written_by">Written By:</label>
                            <input type="text" class="form-control" id="written_by" name="written_by" 
                                   value="{{ old('written_by') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Answer -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="answer">Answer:</label>
                            <textarea class="form-control" id="answer" name="answer" required>{{ old('answer') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Add FAQ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
