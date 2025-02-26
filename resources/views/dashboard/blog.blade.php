@extends('layouts.dashboard')

@section('content')
<div class="add-faq">
    <h3 class="p-2">Blog Management</h3>
    <a href="/dashboard/blog/create"><button>Add Blog</button></a>
</div>
    <div class="dashboard">
        <div class="container">
            <div class="table-box">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width:7%">Sr. No</th>
                            <th style="width:10%">Image</th>
                            <th style="width:20%">Title</th>
                            <th style="width:35%">Description</th>
                            <th style="width:12%">Publish Date</th>
                            <th style="width:15%">Category</th>
                            <th style="width:7%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $index => $blog)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ asset('storage/' . $blog['image']) }}" alt="Blog Image" width="50"></td>
                            <td>{{ $blog['title'] }}</td>
                            <td>{{ $blog['description'] }}</td>
                            <td>{{ $blog['publish'] }}</td>
                            <td>{{ $blog['category'] }}</td>
                            <td>
                           <div class="btn-container">
                                    <button onclick="viewBlog('{{ $blog['title'] }}', '{{ $blog['description'] }}', '{{ $blog['publish'] }}', '{{  $blog['image']}}' , '{{ $blog['category']}}' ,'{{ $blog['meta_keywords']}}','{{ $blog['meta_description']}}','{{ $blog['slug']}}','{{ $blog['active'] == 1 ? 'Active' : 'Unactive' }}', {{ json_encode($blog['meta_tags']) }},)" class="view-btn"><i class="fa-regular fa-eye"></i></button>
                                    <a href="{{ route('dashboard.blog.update', $blog['id']) }}" class="view-btn"><i class="fa-solid fa-pen"></i></a>
                                      
                                <button class="delete-btn" onclick="openDeleteModal({{ $blog->id }})">
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



<div class="overlay" id="overlay" onclick="closeServiceModal()"></div>

<!-- Service View Modal -->
<div class="modal" id="serviceModal">
    
    <div class="view-popup">
        <div class="close-btn" onclick="closeServiceModal()">
            <i class="fa-solid fa-circle-xmark text-white"></i>
        </div>
   
        <div class="viewpopup-content">
       
            <div class="popup-body">
                <h4 class="my-3">Blogs Detail</h4>
                <img id="modal-service-image" src="" alt="Service Image" class="w-100 my-3">
               <div class="d-flex gap-4 align-items-center">
                <h4 id='modal-service-name' class="fs-3"></h4><button id="modal-service-active" class="btn"></button>
               </div>
                <p class="fs-6">
                   <strong>Category</strong> :<span id="modal-service-category"></span> | <strong>Publish At</strong> :<span id="modal-service-pub"></span> 
                </p>
                <strong>Description</strong> 
                <p id="modal-service-description"></p>
            
                <div class="header">
                    <p><strong>Keywords :</strong> <span id="modal-service-keywords"></span></p>
                   
                    <p><strong>slug :</strong> <span id="modal-service-slug"></span></p>
                    
                    <p><strong>Meta- Description :</strong> <span id="modal-service-meta-description"></span></p>
                   
                    <p id="modal-service-slug"></p>
                    <p id="modal-service-active"></p>
                    <p><strong>Meta Tags:</strong> <span id="modal-service-tags"></span></p>

                </div>
         
            </div>
        </div>
    </div>
</div>


<div id="deletePopup" class="delete-popup" style="display: none;">
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
       



<script>
    // Open delete confirmation modal
    function openDeleteModal(id) {
        deleteServiceId = id;
        document.getElementById('deleteForm').action = `/dashboard/blog/${deleteServiceId}`;
        document.getElementById('deletePopup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    // Close delete confirmation modal
    function closeDeleteModal() {
        document.getElementById('deletePopup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    // Open view modal with blog details
    function viewBlog(title, description, publish, image ,category,meta_keywords,meta_description,slug,active,meta_tags ) {
        document.getElementById('modal-service-name').textContent = title;
        document.getElementById('modal-service-description').innerHTML = description;
        document.getElementById('modal-service-category').textContent = category;
        document.getElementById('modal-service-pub').textContent = publish;
        document.getElementById('modal-service-meta-description').textContent = meta_description;
        document.getElementById('modal-service-keywords').textContent = meta_keywords;
        document.getElementById('modal-service-slug').textContent = slug;
        document.getElementById('modal-service-active').textContent = active;
        if(active == "Active") {
            document.getElementById('modal-service-active').classList.add("btn-success");
            document.getElementById('modal-service-active').classList.remove("btn-danger");
        } else {
            document.getElementById('modal-service-active').classList.add("btn-danger");
            document.getElementById('modal-service-active').classList.remove("btn-success");
        }
        const buttons = meta_tags.split(",").map((tag) => {
            return `<button class="meta-tags">${tag.trim()}</button>`; // Make sure to trim any extra spaces
        });

        document.getElementById('modal-service-tags').innerHTML = buttons.join(' ');


        document.getElementById('modal-service-image').src = '/storage/' + image;

        document.getElementById('serviceModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    // Close view modal
    function closeServiceModal() {
        document.getElementById('serviceModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>

@endsection
