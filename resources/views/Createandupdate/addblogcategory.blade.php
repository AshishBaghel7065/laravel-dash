@extends('layouts.dashboard')

@section('content')
<div class="add-faq">
    <h3 class="p-2">Blog Category Management</h3>
    <a href="/dashboard/blog"><button>Back To Blog</button></a>
</div>

<form method="POST" action="{{ route('dashboard.blog.category.create') }}" enctype="multipart/form-data" class="add-form">
    @csrf
    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <label for="blog_category">Create New Blog Category</label>
                <input type="text" class="form-control border rounded" id="title" name="title" placeholder="Enter New Blog Category" required>
                <input type="submit" value="Submit" class="submit-btn mt-3">
            </div>
        </div>

        <div class="col-lg-7">
            <div class="dashboard overscroll">
                <div class="container">
                    <div class="table-box">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:10%">Sr. No</th>
                                    <th style="width:80%">Blog Category</th>
                                    <th style="width:10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="categoryTableBody">
                                @foreach ($Blogcategories as $index => $category)
                                    <tr id="categoryRow{{ $category->id }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ ucwords($category->title) }}</td>
                                        <td>
                                            <div class="action-container">
                                                <!-- Delete Button -->
                                                <a href="#" class="delete-btn" onclick="openDeleteModal({{ $category->id }})">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($Blogcategories->isEmpty())
                            <p class="text-center mt-3">No blog categories available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Confirmation Popup Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
        <h5>Are you sure you want to delete this blog category?</h5>
        <p>This action cannot be undone.</p>
        <div class="popup-actions">
            <button onclick="confirmDelete()" class="btn btn-danger">Delete</button>
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
        </div>
    </div>
</div>

<script>
    let deleteServiceId = null;

    function openDeleteModal(id) {
        deleteServiceId = id;
        document.getElementById('deletePopup').style.display = 'block';
    }

    function closeDeleteModal() {
        document.getElementById('deletePopup').style.display = 'none';
    }

    function confirmDelete() {
        if (!deleteServiceId) return;

        fetch(`/dashboard/blog/category/${deleteServiceId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to delete category');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Remove row from table
                const row = document.getElementById(`categoryRow${deleteServiceId}`);
                if (row) row.remove();

                // Close modal
                closeDeleteModal();
                
                // Refresh the page after successful deletion
                window.location.reload();
            } else {
                alert(data.message); // Show error message from Laravel
            }
        })
        .catch(error => {
            console.error('Error deleting category:', error);
        });
    }
</script>

@endsection
