

<div class="add-poster">
    <h3 class="p-2">Manage Posters</h3>
</div>

<div class="dashboard">
    <div class="container">
        <div class="row">     
            @foreach ($posters as $image)
            <div class="col-lg-4">
                <div class="gallery-item my-3" data-id="{{ $image->id }}">
                    <p class="text-center pt-1">{{ $image->postername}}</p>
                  <img 
    src="{{ asset('posters/' . $image->image) }}"  
    alt="{{ $image->image }}" 
    class="full-screen-trigger"
    data-image="{{ asset('posters/' . $image->image) }}">

                    <div class="gallery-action text-center py-2">
                      <button class="edit-btn" onclick="openUpdateModal({{ $image->id }}, '{{ asset('posters/' . $image->image) }}')">
                            Update Poster <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Update Poster Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Poster</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="poster_id" id="posterId">
                    
                    <label for="updatePosterName" class="form-label">Poster Name</label>
                    <input type="text" name="postername" id="updatePosterName" class="form-control border" required>

                    <label for="image" class="form-label">Select an Image (Optional)</label>
                    <input type="file" name="image" id="image" class="form-control border">

                    <button type="submit" class="btn btn-primary mt-3">Update Poster</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openUpdateModal(id, imageUrl) {
        // Set form action dynamically
        document.getElementById("updateForm").action = "/dashboard/posters/update/" + id;
        
        // Set the ID in hidden input
        document.getElementById("posterId").value = id;
        
        // Populate the poster name input field
        let posterName = document.querySelector(`[data-id='${id}'] p`).innerText;
        document.getElementById("updatePosterName").value = posterName;

        // Show the modal
        let updateModal = new bootstrap.Modal(document.getElementById("updateModal"));
        updateModal.show();
    }
</script>


