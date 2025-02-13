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
        background: rgba(24, 24, 24, 0);
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
    <h3 class="p-2">FAQ Management</h3>
    <a href="/dashboard/faq/create"><button>Add Button</button></a>
</div>

<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:30%">Question</th>
                        <th style="width:40%">Answer</th>
                        <th style="width:14%">Written By</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $index => $faq)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>{{ $faq->written_by }}</td>
                        <td>
                           <div class="action-container">
                            <button onclick="fetchFaq({{ $faq->id }})" class="view-btn"><i class="fa-regular fa-eye"></i></button>
                            <a href="{{ route('dashboard.faq.edit', $faq->id) }}" class="edit-btn">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            
                            <a href="#" class="delete-btn" onclick="openDeleteModal({{ $faq->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <form id="deleteForm{{ $faq->id }}" action="{{ route('dashboard.faq.delete', $faq->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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
        <div class="close-btn" onclick="closeDeleteModal()">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="m-2">
            <h5 class="mx-2">Are you sure you want to delete this FAQ?</h5>
        </div>
        <div class="popup-body">
            <p>This action cannot be undone.</p>
        </div>
        <div class="popup-actions">
            <button class="btn btn-danger" onclick="deleteFaqFromDatabase()">Delete</button>
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>


<!-- Overlay -->
<div class="overlay" id="overlay" onclick="closeModal()"></div>

<!-- FAQ View Modal -->
<div class="modal" id="faqModal">
    <div class="view-popup">
        <div class="viewpopup-content">
            <div class="close-btn" onclick="closeModal()">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <h5 class="mx-3">FAQ Detail</h5>
            <div class="popup-body">
                <p><strong>Question:</strong></p>
                <p id="modal-question"></p>
                <p><strong>Answer:</strong></p>
                <p id="modal-answer"></p>
                <p><strong>Written By:</strong></p>
                <p id="modal-written-by"></p>
            </div>
        </div>
    </div>
</div>

<script>


let deleteFaqId = null;

// Open the delete confirmation modal and set the FAQ ID
function openDeleteModal(id) {
    deleteFaqId = id;
    document.getElementById('deletePopup').style.display = 'block';
}

// Close the delete confirmation modal
function closeDeleteModal() {
    document.getElementById('deletePopup').style.display = 'none';
}

// Submit the delete form
function deleteFaqFromDatabase() {
    if (deleteFaqId) {
        // Find the form for the specific FAQ and submit it
        document.getElementById(`deleteForm${deleteFaqId}`).submit();
    }
}



function fetchFaq(id) {
    fetch(`/dashboard/faq/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modal-question').textContent = data.question;
            document.getElementById('modal-answer').textContent = data.answer;
            document.getElementById('modal-written-by').textContent = data.written_by;

            document.getElementById('faqModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        })
        .catch(error => console.error('Error fetching FAQ:', error));
}

function closeModal() {
    document.getElementById('faqModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

</script>

@endsection
