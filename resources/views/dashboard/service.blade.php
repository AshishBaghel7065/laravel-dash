@extends('layouts.dashboard')

@section('content')
<div class="add-faq">
    <h3 class="p-2">Service Management</h3>
    <a href="/dashboard/service/create"><button>Add Service</button></a>
</div>




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
<td><img src="{{ asset('services/'.$service->image) }}" alt="Service Image" width="50"></td>


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


<div class="col-lg-6 my-5">
    <div class="d-flex flex-wrap my-2 align-items-center justify-content-between">
        <h5 class="p-2">Service Category Management</h5>
        <a href="/dashboard/service/category/create"><button class="add-btn">Add Service Cetegory</button></a>
    </div>
    
<div class="dashboard ">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th >Sr. No</th>
                        <th >Service Category</th>
                       
                    </tr>
                </thead>
                <tbody id="categoryTableBody">
                    @foreach ($globalServiceCategories as $index => $category)
                        <tr id="categoryRow{{ $category->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ ucwords($category->title) }}</td>
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
                <h5 class="bg-light p-3">Service Detail |  <button id="modal-service-active" class="btn"></button></h5>
                
                <img id="modal-service-image" src="" alt="Service Image" class="w-50 border rounded">
                <p><strong>Category : </strong>  <span id="modal-service-category"></span> | </p>
                <h5 class="mt-2"><span id="modal-service-name"></span></h5>
               
                <h3 id="modal-service-name"></h3>
                <p><strong>Description:</strong><span id="modal-service-description"></span></p>
            
         
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
                document.getElementById('modal-service-image').src = '/services/' + data.image;
    
                document.getElementById('serviceModal').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
                let myactive =""
                if(data.active == 1){
                    myactive = "Active"
                }
                else if(data.active == 0){
                     myactive = "Unactive"
                }
                document.getElementById('modal-service-active').textContent =myactive;
        if(myactive == "Active") {
            document.getElementById('modal-service-active').classList.add("btn-success");
            document.getElementById('modal-service-active').classList.remove("btn-danger");
        } else {
            document.getElementById('modal-service-active').classList.add("btn-danger");
            document.getElementById('modal-service-active').classList.remove("btn-success");
        }
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
