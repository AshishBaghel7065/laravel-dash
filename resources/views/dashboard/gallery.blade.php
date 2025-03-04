@extends('layouts.dashboard')

@section('content')

<!-- Gallery Management -->
<div class="add-faq">
    <h3 class="p-2">Gallery Management</h3>
    <button type="button" data-bs-toggle="modal" data-bs-target="#uploadModal">
        Upload Image
    </button>
</div>

<!-- Upload Image Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Gallery Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" method="POST" action="{{ route('dashboard.gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="image" class="form-label">Select an Image</label>
                    <input type="file" name="image" id="imageInput" class="form-control border" required>
                    <button type="submit" class="btn btn-success mt-3">Upload Image</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Container -->
<div class="gallery-container" id="galleryContainer">
    @foreach ($galleries as $image)
        <div class="gallery-item" data-id="{{ $image->id }}">
           <img src="{{ asset('gallery/' . $image->image) }}" 
     alt="{{ $image->image }}" 
     class="full-screen-trigger"
     data-image="{{ asset('gallery/' . $image->image) }}">

            
            <div class="gallery-actions">
                <button class="delete-btn" onclick="openDeleteModal({{ $image->id }})">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>
    @endforeach
</div>

<!-- Delete Confirmation Modal -->
<div id="deletePopup" class="delete-popup" style="display: none;">
    <div class="deletepopup-content">
        <div class="close-btn" onclick="closeDeleteModal()">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="m-2">
            <h5 class="mx-2">Are you sure you want to delete this image?</h5>
        </div>
        <div class="popup-body">
            <p>This action cannot be undone.</p>
        </div>
        <div class="popup-actions">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
            </form>
        </div>
    </div>
</div>

<!-- Pagination -->
<nav aria-label="Page navigation">
    <ul class="pagination mb-5 mx-3">
        <li class="page-item">
            <button class="page-link" id="prevPage">« Prev</button>
        </li>
        <span id="pageNumbers" class="d-flex"></span>
        <li class="page-item">
            <button class="page-link" id="nextPage">Next »</button>
        </li>
    </ul>
</nav>

<!-- Fullscreen Image Modal -->
<div class="modal" id="imageModal" onclick="closeModal()">
    <span class="close-modal" onclick="closeModal()">&times;</span>
    <img id="fullImage">
</div>

<script>
    let currentPage = 1;
    const perPage = 8;
    let galleryItems = Array.from(document.querySelectorAll('.gallery-item')).reverse(); 
    let totalPages = Math.ceil(galleryItems.length / perPage);

    function showPage(page) {
        let start = (page - 1) * perPage;
        let end = start + perPage;

        galleryItems.forEach((item, index) => {
            item.style.display = index >= start && index < end ? 'block' : 'none';
        });

        document.getElementById('prevPage').disabled = page === 1;
        document.getElementById('nextPage').disabled = page === totalPages;

        updatePageNumbers();
    }

    function updatePageNumbers() {
        let pageNumbers = document.getElementById('pageNumbers');
        pageNumbers.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            let btn = document.createElement('button');
            btn.classList.add('page-link');
            btn.textContent = i;
            btn.onclick = function () {
                currentPage = i;
                showPage(currentPage);
            };
            if (i === currentPage) {
                btn.classList.add('active');
            }
            pageNumbers.appendChild(btn);
        }
    }

    document.getElementById('prevPage').addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
        }
    });

    document.getElementById('nextPage').addEventListener('click', function () {
        if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
        }
    });

    showPage(currentPage);

    // Fullscreen image preview
    document.querySelectorAll('.full-screen-trigger').forEach(image => {
        image.addEventListener('click', function () {
            document.getElementById('fullImage').src = this.getAttribute('data-image');
            document.getElementById('imageModal').style.display = 'flex';
        });
    });

    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
    }

    let deleteImageId = null;

function openDeleteModal(id) {
    deleteImageId = id;
    document.getElementById('deleteForm').action = `/dashboard/gallery/${deleteImageId}`;
    document.getElementById('deletePopup').style.display = 'block';
}

function closeDeleteModal() {
    document.getElementById('deletePopup').style.display = 'none';
}
</script>

@endsection
