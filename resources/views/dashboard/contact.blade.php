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
                        <th style="width:29%">Message</th>
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
                            <button onclick="viewContact('{{ $contact['name'] }}', '{{ $contact['phone'] }}', '{{ $contact['email'] }}', '{{ $contact['date_of_appointment'] }}', '{{ $contact['message'] }}')" class="view-btn"><i class="fa-regular fa-eye"></i></button>
                            <button href="#" class="delete-btn" onclick="openDeleteModal({{ $contact['id'] }})"><i class="fa-solid fa-trash"></i></button>
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
            <h5 class="mx-2">Are you sure you want to delete this contact?</h5>
        </div>
        <div class="popup-body">
            <p>This action cannot be undone.</p>
        </div>
        <div class="popup-actions">
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- Contact View Modal -->
<div class="modal" id="contactModal" style="display: none;">
    <div class="view-popup">
        <div class="viewpopup-content">
            <div class="close-btn" onclick="closeModal()">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <h5 class="mx-3">Contact Detail</h5>
            <div class="popup-body">
                <p><strong>Name:</strong> <span id="modal-name"></span></p>
               
                <p><strong>Mobile:</strong> <span id="modal-mobile"></span></p>
               
                <p><strong>Email:</strong> <span id="modal-email"></span></p>
               
                <p><strong>Appointment Date:</strong> <span id="modal-date"></span></p>
               
                <p><strong>Message:</strong>  <span id="modal-message"></span></p>
              
            </div>
        </div>
    </div>
</div>

<script>
function viewContact(name, phone, email, date, message) {
    document.getElementById('modal-name').textContent = name;
    document.getElementById('modal-mobile').textContent = phone;
    document.getElementById('modal-email').textContent = email;
    document.getElementById('modal-date').textContent = date;
    document.getElementById('modal-message').textContent = message;
    document.getElementById('contactModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('contactModal').style.display = 'none';
}

let deleteContactId = null;
function openDeleteModal(id) {
    deleteContactId = id;
    document.getElementById('deletePopup').style.display = 'block';
    document.getElementById('deleteForm').action = `/dashboard/contact/delete/${id}`;
}

function closeDeleteModal() {
    document.getElementById('deletePopup').style.display = 'none';
}
</script>
@endsection
