@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="add-faq">
        <h3 class="p-2">Product Management</h3>
        <a href="/dashboard/product/create"><button>Add Product</button></a>
    </div>
    <div class="dashboard">
        <div class="container">
            <div class="table-box">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width:6%">#</th>
                            <th style="width:15%">Image</th>
                            <th style="width:20%">Product Name</th>
                            <th style="width:30%">description</th>
                            <th style="width:15%">Category</th>
                            <th style="width:10%">Price (₹)</th>
                            <th style="width:7%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($globalProducts as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('products/' . $product['product_image']) }}" alt="Product Image"
                                    width="60">
                            </td>
                            <td>{{ $product['name'] }}</td>

                            <td>{{ $product['description'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>₹{{ number_format($product['price'], 2) }}</td>

                            <td>
                                <div class="btn-container">
                                    <button onclick="fetchReview({{$product->id}})" class="view-btn"
                                        data-review-id="123">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <a href="{{ route('dashboard.product.edit', $product->id) }}" class="edit-btn">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <button class="delete-btn" onclick="openDeleteModal({{ $product['id'] }})">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Delete Confirmation Popup Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
        <div class="m-2">
            <h5 class="mx-2">Are you sure you want to delete this review?</h5>
        </div>
        <div class="popup-body">
            <p>This action cannot be undone.</p>
        </div>
        <div class="popup-actions">
            <form id="deleteForm" action="#" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>
<div class="overlay" id="overlay" onclick="closeServiceModal(); closeDeleteModal();"></div>

<div class="modal" id="serviceModal">
    <div class="view-popup">
        <div class="close-btn" onclick="closeServiceModal()">
            <i class="fa-solid fa-circle-xmark text-white"></i>
        </div>
        <div class="viewpopup-content text-center product">
            <div class="popup-body">
                <table>
                    <tr>
                        <th colspan="2">
                            <h3 class="mx-3 text-center">Product Detail</h3>

                        </th>
                    </tr>
                    <tr>
                        <td>
                            <p>Image</p>
                        </td>
                        <td>
                            <img id="modal-service-image" src="" alt="Service Image" width="100" height="100"
                                style="border-radius: 50%;margin:auto;" class="my-3">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Product Name:</strong>
                        </td>
                        <td>
                            <h6><span id="modal-service-username"></span></h6>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Cetegory :</strong> </td>
                        <td>
                            <h6><span id="modal-service-category"></span></h6>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Price:</strong></td>
                        <td>
                            <h6 class="my-3"> ₹ <span id="modal-service-price"></span></h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h6>
                                <p>Description :</p>
                            </h6>
                        </td>
                        <td>
                            <p id="modal-service-description"></p>
                        </td>
                    </tr>


                </table>


            </div>
        </div>
    </div>
</div>

<div class="col-lg-6 my-5">
    <div class="d-flex flex-wrap my-2 align-items-center justify-content-between">
        <h5 class="p-2">Product Category Management</h5>
        <a href="/dashboard/product/category/create"><button class="add-btn">Add Product Cetegory</button></a>
    </div>
    
<div class="dashboard ">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th >Sr. No</th>
                        <th >Product Category</th>
                       
                    </tr>
                </thead>
                <tbody id="categoryTableBody">
                    @foreach ($globalproductCategories as $index => $category)
                        <tr id="categoryRow{{ $category->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ ucwords($category->category_title) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($globalServiceCategories->isEmpty())
                <p class="text-center mt-3">No service categories available.</p>
            @endif
        </div>
    </div>
</div>

</div>
<script>
    function fetchReview(id) {

        fetch(`/dashboard/product/${id}`)
            .then(response => response.json())
            .then(data => {

                if (!data) {
                    console.error('No data received');
                    return;
                }
                console.log(data);

                // Populate modal fields
                document.getElementById('modal-service-username').textContent = data.name || 'N/A';
                document.getElementById('modal-service-price').textContent = data.price || 'No Prices Provided';
                document.getElementById('modal-service-description').innerHTML = data.description || 'N/A';
                document.getElementById('modal-service-image').src = `/products/${data.product_image}`;
                document.getElementById('modal-service-category').textContent = data.category;


                // Show modal
                document.getElementById('serviceModal').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            })
            .catch(error => console.error('Error fetching review:', error));
    }
    // Close the service view modal
    function closeServiceModal() {
        document.getElementById('serviceModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    let deleteReviewId = null;

    function openDeleteModal(id) {
        deleteReviewId = id;
        document.getElementById('deleteForm').action = `/dashboard/product/${deleteReviewId}`;
        document.getElementById('deletePopup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    // Close the delete confirmation modal
    function closeDeleteModal() {
        document.getElementById('deletePopup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>
@endsection