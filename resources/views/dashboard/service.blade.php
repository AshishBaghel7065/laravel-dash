@extends('layouts.dashboard')

@section('content')
<div class="add-faq">
    <h3 class="p-2">Service Management</h3>
    <a href="/dashboard/service/create"><button>Add Service</button></a>
</div>

@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 5%">Sr. No</th>
                        <th style="width: 10%">Image</th>
                        <th style="width:20%">Service Name</th>
                        <th style="width: 40%">Description</th>
                        <th style="width:10%">Category</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $index => $service)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img src="{{ asset('storage/'.$service->image) }}" alt="Service Image" width="50"></td>
                        <td>{{ $service->service }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->category }}</td>
                        <td>
                            <div class="action-container">
                                <a href="javascript:void(0)" onclick="fetchService({{ $service->id }})">
                                    <button class="view-btn"><i class="fa-regular fa-eye"></i></button>
                                </a>
                                
                                <a href="{{ route('dashboard.service.getByIds', $service->id) }}" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                
                                <a href="#" class="delete-btn" onclick="openDeleteModal({{ $service->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--<!-- Delete Confirmation Popup Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
        <div class="m-2">
            <h5 class="mx-2">Are you sure you want to delete this FAQ?</h5>
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


<div class="overlay" id="overlay" onclick="closeServiceModal()"></div>

<!-- Service View Modal -->
<div class="modal" id="serviceModal">
    
    <div class="view-popup">
        <div class="close-btn" onclick="closeServiceModal()">
            <i class="fa-solid fa-circle-xmark text-white"></i>
        </div>
   
        <div class="viewpopup-content">
       
            <div class="popup-body">
                <h1 class="mx-3">Service Detail</h1>
                <img id="modal-service-image" src="" alt="Service Image" class="w-100">
                <h3><strong>Service Name:</strong></h3>
                <p><strong>Category:</strong>  
                     <p id="modal-service-category"></p></p>
                <h3 id="modal-service-name"></h3>
                <p><strong>Description:</strong></p>
                <p id="modal-service-description"></p>
            
         
            </div>
        </div>
    </div>
</div>

<script>
    // Fetch service details based on ID
    function fetchService(id) {
        fetch(`/dashboard/service/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modal-service-name').textContent = data.service;
                document.getElementById('modal-service-description').innerHTML = data.description;
                document.getElementById('modal-service-category').textContent = data.category;
                document.getElementById('modal-service-image').src = '/storage/' + data.image;
    
                document.getElementById('serviceModal').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            })
            .catch(error => console.error('Error fetching service:', error));
    }
    
    // Close the service view modal
    function closeServiceModal() {
        document.getElementById('serviceModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
    </script>
<script>
// Set the delete service ID
let deleteServiceId = null;

function openDeleteModal(id) {
    deleteServiceId = id;
    document.getElementById('deleteForm').action = `/dashboard/service/${deleteServiceId}`;
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
