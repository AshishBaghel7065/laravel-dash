@extends('layouts.dashboard')

@section('content')

<h3 class="p-2">Achievements</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:10%">Sr. No</th>
                        <th style="width:60%">Achievement Title</th>
                        <th style="width:20%">Number</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($achievements as $index => $achievement)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $achievement->title }}</td>
                            <td>{{ $achievement->count }}</td>
                            <td>
                                <div class="btn-container">
                                    <button onclick="fetchAchievement( {{$achievement->id}})"><i class="fa-regular fa-eye"></i></button>
                                <a href="{{ route('dashboard.achievement.edit', $achievement->id) }}" class="view-btn"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('dashboard.achievement.delete', $achievement->id) }}" method="POST" style="display:inline;" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn"><i class="fa-solid fa-trash"></i></button>
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
                <p><strong>Title:</strong> <span id="modal-title"></span></p>
                <p><strong>Count:</strong> <span id="modal-count"></span></p>
                <button onclick="closeAchievementModal()">Close</button>
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
    function viewService(name,count) {
        document.getElementById('modal-title').innerText = name;
        document.getElementById('modal-count').innerText = count;
        document.getElementById('serviceModal').style.display = 'block';
    }
    function closeModalService() {
        document.getElementById('serviceModal').style.display = 'none';
    }
</script>

@endsection
