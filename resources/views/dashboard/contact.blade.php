@extends('layouts.dashboard')

@section('content')
<h3 class="p-2">Contact</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:12%">Name</th>
                        <th style="width:15%">Mobile</th>
                        <th style="width:15%">Email</th>
                        <th style="width:15%">Date of Appointment</th>
                        <th style="width:22%">Message</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $contacts = [
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                        ];
                    @endphp
                    @foreach ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $contact['name'] }}</td>
                        <td>{{ $contact['mobile'] }}</td>
                        <td>{{ $contact['email'] }}</td>
                        <td>{{ $contact['appointment_date'] }}</td>
                        <td class="msg">{{ $contact['message'] }}</td>
                        <td>
                           <div class="btn-container">
                            <button onclick="viewService('Web Development', 'Providing high-quality web development services.', 'web-development', 'https://via.placeholder.com/50')" class="view-btn"><i class="fa-regular fa-eye"></i></button>
                            <a href="#" class="view-btn"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" class="delete-btn" onclick="openDeleteModal()"><i class="fa-solid fa-trash"></i></a>
                           </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Delete Confirmation Popup Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
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
            <div class="close-btn" onclick="closeModalService()">
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
    function closeModalService() {
        document.getElementById('serviceModal').style.display = 'none';
    }
</script>
@endsection

