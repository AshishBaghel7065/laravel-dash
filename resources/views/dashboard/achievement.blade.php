@extends('layouts.dashboard')

@section('content')


<div class="add-faq">
    <h3 class="p-2">Achievements Management</h3>
    <a href="/dashboard/achievement/create"><button>Add Button</button></a>
</div>

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
                    @foreach ($achievements->reverse() as $index => $achievement)
                    <tr>
                        <td>{{ $achievements->count() - $index }}</td>
                        <td>{{ $achievement->title }}</td>
                        <td>{{ $achievement->count }}</td>
                        <td>
                            <div class="btn-container">
                                <button onclick="fetchAchievement({{ $achievement->id }})" class="view-btn">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <a href="{{ route('dashboard.achievement.edit', $achievement->id) }}" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <button type="button" class="delete-btn" onclick="openDeleteModal({{ $achievement->id }})">
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

<!-- Delete Confirmation Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
        <h5 class="mx-2">Are you sure you want to delete this achievement?</h5>
        <p>This action cannot be undone.</p>
        <div class="popup-actions">
            <form id="delete-form" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- Achievement View Modal -->
<div class="modal" id="achievementModal">
    <div class="view-popup">
        <div class="viewpopup-content">
            <div class="close-btn" onclick="achievementcloseModal()">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <h5>Achievement Detail</h5>
            <div class="popup-body">
                <p class="fs-3"><strong>Title:</strong> <span id="modal-title"></span></p>
                <p class="fs-1"><strong>Count:</strong> <span id="modal-count"></span></p>
            </div>
        </div>
    </div>
</div>
<div class="overlay" id="overlay" onclick="achievementcloseModal()"></div>

<script>
    let deleteId = null;

    function fetchAchievement(id) {
        // Assuming achievementData contains the necessary data for the modal
        const data = achievementData[id];
        document.getElementById('modal-title').textContent = data.title;
        document.getElementById('modal-count').textContent = data.count;
        document.getElementById('achievementModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function achievementcloseModal() {
        document.getElementById('achievementModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    function openDeleteModal(id) {
        deleteId = id;
        // Set the action URL for the delete form
        const form = document.getElementById('delete-form');
        form.action = `/dashboard/achievement/${id}`;
        document.getElementById('deletePopup').style.display = 'block';
    }

    function closeDeleteModal() {
        document.getElementById('deletePopup').style.display = 'none';
        deleteId = null;
    }
</script>
@endsection
