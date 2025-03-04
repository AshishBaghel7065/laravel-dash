@extends('layouts.dashboard')

@section('content')

<div class="add-faq">
    <h3 class="p-2">Review Management</h3>
    <a href="/dashboard/review/create"><button>Add Review</button></a>
</div>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:15%">Username</th>
                        <th style="width:15%">Posted date</th>
                        <th style="width:30%">Review</th>
                        <th style="width:10%">Posted Date</th>
                        <th style="width:10%">Stars</th>
                        <th style="width:7%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
      <td><img src="{{ asset('reviews/' . $review['user_image']) }}" alt="User Image"></td>

                        <td>{{ $review['username'] }}</td>
                
                        <td>{{ $review['review'] }}</td>
                        <td>{{ $review['posted_date'] }}</td>

                        <td>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review['stars'] ? 's' : 'r' }} fa-star" style="color: gold;"></i>
                            @endfor
                        </td>
                        <td>
                            <div class="btn-container">
                                <button onclick="fetchReview({{$review->id}})" class="view-btn" data-review-id="123">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                
                                <a href="{{ route('dashboard.review.getByIds', $review->id) }}" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="#" class="delete-btn" onclick="openDeleteModal({{ $review->id }})"><i class="fa-solid fa-trash"></i></a>
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
            <h5 class="mx-2">Are you sure you want to delete this review?</h5>
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

<!-- Overlay -->
<div class="overlay" id="overlay" onclick="closeServiceModal(); closeDeleteModal();"></div>

<!-- Service View Modal -->
<div class="modal" id="serviceModal">
    <div class="view-popup">
        <div class="close-btn" onclick="closeServiceModal()">
            <i class="fa-solid fa-circle-xmark text-white"></i>
        </div>
        <div class="viewpopup-content text-center">
            <div class="popup-body">
                <h3 class="mx-3">Review Detail</h3>
                <img id="modal-service-image" src="" alt="Service Image" width="100" height="100" style="border-radius: 50%;margin:auto;"  class="my-3">
                <h6><strong>Username:</strong> <span id="modal-service-username"></span></h6>
               
                <h6 class="my-3"><strong>Review:</strong> <span id="modal-service-review"></span></h6>
               
                <h6><strong>Posted Date:</strong> <span id="modal-service-posted-date"></span></h6>
               
                <h6><strong>Stars:</strong> <span id="modal-service-stars"></span></h6>
               
            </div>
        </div>
    </div>
</div>

<script>
   function fetchReview(id) {

    fetch(`/dashboard/review/${id}`)
        .then(response => response.json())
        .then(data => {
          
            if (!data) {
                console.error('No data received');
                return;
            }

            // Populate modal fields
            document.getElementById('modal-service-username').textContent = data.username || 'N/A';
            document.getElementById('modal-service-review').textContent = data.review || 'No review provided';
            document.getElementById('modal-service-posted-date').textContent = data.posted_date || 'N/A';
            document.getElementById('modal-service-stars').innerHTML = generateStarRating(data.stars || 0);
            document.getElementById('modal-service-image').src = `/reviews/${data.user_image}`;

            // Show modal
            document.getElementById('serviceModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        })
        .catch(error => console.error('Error fetching review:', error));
}

 
    // Generate star rating HTML
    function generateStarRating(stars) {
        let starHtml = '';
        for (let i = 1; i <= 5; i++) {
            starHtml += `<i class="fa${i <= stars ? 's' : 'r'} fa-star" style="color: gold;"></i>`;
        }
        return starHtml;
    }

    // Close the service view modal
    function closeServiceModal() {
        document.getElementById('serviceModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    // Set the delete review ID
    let deleteReviewId = null;

    function openDeleteModal(id) {
        deleteReviewId = id;
        document.getElementById('deleteForm').action = `/dashboard/review/${deleteReviewId}`;
        document.getElementById('deletePopup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    // Close the delete confirmation modal
    function closeDeleteModal() {
        document.getElementById('deletePopup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>


@endsection
