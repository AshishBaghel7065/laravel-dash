@extends('layouts.dashboard')

@section('content')
<style>
    .modal, .overlay {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        background: transparent;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }
    .overlay {
        width: 100%;
        height: 100%;
        background: rgba(24, 24, 24, 0.5);
        z-index: 999;
    }
    .close-btn {
        float: right;
        font-size: 29px;
        cursor: pointer;
        color: red;
    }
</style>

<div class="add-faq">
    <h3 class="p-2">Service Management</h3>
    <button onclick="addService()">Add Service</button>
</div>

<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:20%">Service Name</th>
                        <th style="width:20%">Image</th>
                        <th style="width:40%">Description</th>
                        <th style="width:14%">Slug</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody id="serviceTableBody">
                    <!-- Dummy Data -->
                    <tr>
                        <td>1</td>
                        <td>Web Development</td>
                        <td><img src="https://via.placeholder.com/50" alt="Service Image"></td>
                        <td>Providing high-quality web development services.</td>
                        <td>web-development</td>
                        <td>
                            <div class="action-container">
                             <button onclick="viewService('Web Development', 'Providing high-quality web development services.', 'web-development', 'https://via.placeholder.com/50')" class="view-btn"><i class="fa-regular fa-eye"></i></button>
                             <a  class="edit-btn">
                                 <i class="fa-solid fa-pen"></i>
                             </a>
                             {{-- href="{{ route('faq.edit', $faq->id) }}" --}}
                             <a href="#" class="delete-btn"  onclick="openDeleteModal()"">
                                 <i class="fa-solid fa-trash"></i>
                             </a>
                             {{-- <form id="deleteForm{{ $faq->id }}" action="{{ route('faq.delete', $faq->id) }}" method="POST" style="display: none;">
                                 @csrf
                                 @method('DELETE')
                             </form> --}}
                            </div>
                         </td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Confirmation Popup Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
        <div class="close-btn" onclick="closeDeleteModal()">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="m-2">
            <h5 class="mx-2">Are you sure you want to delete this service?</h5>
        </div>
        <div class="popup-body">
            <p>This action cannot be undone.</p>
        </div>
        <div class="popup-actions">
            <button class="btn btn-danger" onclick="deleteService()">Delete</button>
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- Overlay -->
<div class="overlay" id="overlay" onclick="closeModal()"></div>

<!-- Service View Modal -->
<div class="modal" id="serviceModal">
    <div class="view-popup">
        <div class="viewpopup-content">
            <div class="close-btn" onclick="closeModal()">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <h5 class="mx-3">Service Detail</h5>
            <div class="popup-body">
                <p><strong>Name:</strong></p>
                <p id="modal-name"></p>
                <p><strong>Description:</strong></p>
                <p id="modal-description"></p>
                <p><strong>Slug:</strong></p>
                <p id="modal-slug"></p>
                <p><strong>Image:</strong></p>
                <img id="modal-image" src="" alt="Service Image" style="width: 100px;">
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal() {
        document.getElementById('deletePopup').style.display = 'block';
    }
    function closeDeleteModal() {
        document.getElementById('deletePopup').style.display = 'none';
    }
    function deleteService() {
        alert('Service deleted successfully!');
        closeDeleteModal();
    }
    function viewService(name, description, slug, image) {
        document.getElementById('modal-name').innerText = name;
        document.getElementById('modal-description').innerText = description;
        document.getElementById('modal-slug').innerText = slug;
        document.getElementById('modal-image').src = image;
        document.getElementById('serviceModal').style.display = 'block';
    }
    function closeModal() {
        document.getElementById('serviceModal').style.display = 'none';
    }
</script>
@endsection
