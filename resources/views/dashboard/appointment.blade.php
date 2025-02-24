@extends('layouts.dashboard')

@section('content')
<style>
    .faded {
    opacity: 0.4; /* Make row almost transparent */
    transition: opacity 0.3s ease-in-out;
}

</style>

<h3 class="p-2">Appointments</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:5%">#</th>
                        <th style="width:25%">Name</th>
                        <th style="width:20%">Phone</th>
                        <th style="width:20%">Email</th>
                        <th style="width:15%">Appointment Date</th>
                        <th style="width:25%">Appointment Date</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $contact['name'] }}</td>
                        <td>{{ $contact['phone'] }}</td>
                        <td>{{ $contact['email'] }}</td>
                        <td>{{ $contact['date_of_appointment'] }}</td>
                        <td class="msg">{{ $contact['message'] }}</td>
                        <td>
                           <div class="btn-container">
                            <button onclick="viewContact('{{ $contact['name'] }}', '{{ $contact['phone'] }}', '{{ $contact['email'] }}', '{{ $contact['date_of_appointment'] }}', '{{ $contact['message'] }}')" class="view-btn">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                            
                            <input type="checkbox" class="toggle-fade" data-row="{{ $index }}">

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
    function viewContact(name, phone, email, date_of_appointment, message) {
    document.getElementById('modal-name').innerText = name;
    document.getElementById('modal-description').innerText = message;
    document.getElementById('modal-slug').innerText = email;
    document.getElementById('modal-image').style.display = 'none'; // Hide image since it's not needed
    document.getElementById('serviceModal').style.display = 'block';
}

function closeModalService() {
    document.getElementById('serviceModal').style.display = 'none';
}


    document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll(".toggle-fade");

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            const rowIndex = this.getAttribute("data-row");
            const row = document.querySelectorAll("tbody tr")[rowIndex];

            if (this.checked) {
                row.classList.add("faded");
            } else {
                row.classList.remove("faded");
            }
        });
    });
});

</script>
@endsection
