@extends('layouts.dashboard')

@section('content')
<style>
    .modal, .overlay {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: transparent;
        z-index: 1000;
    }
    .overlay {
        width: 100%;
        height: 100%;
        background: rgba(24, 24, 24, 0.5);
        z-index: 999;
    }
    .popup-content {
        background: white;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }
</style>


<div class="add-faq">
    <h3 class="p-2">About Management</h3>
    <a href="/dashboard/about/create"><button>Add About</button></a>
</div>

<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr. No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($about as $index => $about)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                      <td><img src="{{ asset('updateabout/'.$about->image) }}" alt="About Image" width="50"></td>

                        <td>{{ $about->title }}</td>
                        <td>{{ $about->description }}</td>
                        <td>
                            <div class="action-container">
                            
                                    <button class="view-btn" onclick="fetchAbout({{ $about->id }})"><i class="fa-regular fa-eye"></i></button>
                              
                                
                                <a href="{{ route('dashboard.about.update', $about->id) }}" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                
                                <button  class="delete-btn" onclick="openDeleteModal({{ $about->id }})" >
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

<!-- View Modal -->
<div id="viewModal" class="modal">
    <div class="view-popup">
        <div class="close-btn" onclick="closeViewModal()">
            <i class="fa-solid fa-circle-xmark text-white"></i>
        </div>
   
        <div class="viewpopup-content">
       
            <div class="popup-body">
                <h4 class="my-3">About Detail</h4>
                <img id="modal-about-image" src="" alt="Service Image" width="300">
                <h4 class="my-3"><strong>Title:</strong> <span id="about-title"></span></h4>
                <p><strong>Description:</strong> <span id="about-description"></span></p>
            
         
            </div>
        </div>
    </div>
</div>


<!--<!-- Delete Confirmation Popup Modal -->
<div id="deleteModal" class="delete-popup" style="display: none;">
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



<div class="overlay" id="overlay" ></div>

<script>
function fetchAbout(id) {
    fetch(`/dashboard/about/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('about-title').textContent = data.title;
            document.getElementById('about-description').innerHTML = data.description;
 document.getElementById('modal-about-image').src = `{{ asset('updateabout') }}/${data.image}`;

            document.getElementById('viewModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        })
        .catch(console.error);
}

function closeViewModal() {
    document.getElementById('viewModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function openDeleteModal(id) {
    document.getElementById('deleteForm').action = `/dashboard/about/${id}`;
    document.getElementById('deleteModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
</script>
@endsection
