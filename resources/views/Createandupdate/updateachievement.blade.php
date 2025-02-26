@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="update-achievement-box">
            <h5>Update Achievement</h5>
            <form action="{{ route('dashboard.achievement.update', $achievement->id) }}" method="POST" enctype="multipart/form-data" class="update-form">
                @csrf
                @method('PUT') <!-- Use PUT for updates -->

                <!-- Achievement Title -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $achievement->title }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="count">Count:</label>
                            <input type="number" class="form-control" id="count" name="count" value="{{ $achievement->count }}" max="9999999999" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update Achievement</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
