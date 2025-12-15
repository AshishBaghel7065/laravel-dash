@extends('layouts.dashboard')

@section('content')
<div class="main-content">
    <div class="container mt-4">
        <div class="add-product-box">
            <div class="add-faq">
                <h5>Update Product</h5>
                <a href="/dashboard/service/category/create"><button>Add Service Category</button></a>
            </div>
            
            <form method="POST" action="{{ route('dashboard.product.update', $product->id) }}" enctype="multipart/form-data" class="add-form">
                @csrf
                @method('PUT') <!-- Use PUT method for updates -->

                <!-- Product Name -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                    </div>
                </div>

                <!-- Price -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="price">Price (₹):</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="" disabled>Select Product Category</option>
                    
                                @foreach ($globalproductCategories as $category)
                                    <option value="{{ strtolower($category->category_title) }}" {{ strtolower($category->category_title) == strtolower($product->category) ? 'selected' : '' }}>
                                        {{ ucwords($category->category_title) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image">Product Image:</label>
                            <input type="file" class="form-control" id="image" name="product_image" accept="image/webp,image/jpeg,image/png,image/jpg,image/gif">
                            <small>Leave blank if you don't want to update the image.</small>
                            <br>
                            <img src="{{ asset('products/' . $product->product_image) }}" alt="Product Image" width="100">
                        </div>
                    </div>

                    <!-- Active/InActive Status -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status">Active / Inactive:</label>
                            <select class="form-control" id="active" name="active" required>
                                <option value="1" {{ $product->active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$product->active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="submit-btn">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Summernote for Description -->
<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 300,
            placeholder: 'Enter product description...',
            tabsize: 2,
            callbacks: {
                onInit: function() {
                    $('.note-editable').css('background-color', 'white');
                }
            }
        });
    });
</script>
@endsection