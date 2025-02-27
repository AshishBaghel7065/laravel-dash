@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="add-service-box">
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
                <h5>Create a New Service</h5>
                <a href="/dashboard/service/category/create"><button>Add Service Category</button></a>
            </div>
            <ul>
               
            </ul>
            <form  method="POST" action="{{ route('dashboard.service.store') }}" enctype="multipart/form-data" class="add-form">
                @csrf <!-- CSRF Token for security -->

                <!-- Service Name -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="service">Service Name:</label>
                            <input type="text" class="form-control" id="service" name="service" value="{{ old('service') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Category -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="" selected disabled>Select Service Category</option>
                                @foreach ($categories as $category)
                                
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
                            <label for="status">Active / Inactive</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1" >Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
               <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
        </div>
    </div>


                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Create Service</button>
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
            placeholder: 'Enter description here...',
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
