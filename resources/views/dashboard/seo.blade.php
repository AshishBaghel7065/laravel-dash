@extends('layouts.dashboard')

@section('content')
<h3 class="text-3xl mt-3 font-semibold mb-6">Metadata</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:12%">Page</th>
                        <th style="width:12%">Title</th>
                        <th style="width:25%">Meta Description</th>
                        <th style="width:25%">Meta Keywords</th>
                        <th style="width:15%">Author</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seoPages as $index => $seoPage)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $seoPage->seopage }}</td>
                        <td>{{ $seoPage->title ?? 'N/A' }}</td>
                        <td>{{ $seoPage->meta_description ?? 'N/A' }}</td>
                        <td>{{ $seoPage->meta_keywords ?? 'N/A' }}</td>
                        <td>{{ $seoPage->author ?? 'N/A' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button onclick="viewSeoPage(
                                    '{{ $seoPage->seopage }}', 
                                    '{{ $seoPage->title ?? 'N/A' }}', 
                                    '{{ $seoPage->meta_description ?? 'N/A' }}', 
                                    '{{ $seoPage->meta_keywords ?? 'N/A' }}', 
                                    '{{ $seoPage->author ?? 'N/A' }}'
                                )" class="view-btn">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                <a href="{{ route('dashboard.seopages.getByIds', $seoPage->id) }}" class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SEO Page View Popup -->
<div id="seoPopup" class="seopopup-overlay" style="display: none;" aria-hidden="true">
    <p onclick="closePopup()" class="close-btn bg-white px-2">
        <i class="fa-solid fa-square-xmark text-white"></i>
    </p>
    <div class="seopopup-content">
        <h6>SEO Page Details</h6>
        <h2><span id="popupPage"></span></h2>
        <p><strong>Title:</strong> <span id="popupTitle"></span></p>
        <p><strong>Meta Description:</strong> <span id="popupDescription"></span></p>
        <p><strong>Meta Keywords:</strong> <span id="popupKeywords"></span></p>
        <p><strong>Author:</strong> <span id="popupAuthor"></span></p>
    </div>
</div>

<!-- JavaScript for View Popup -->
<script>
function viewSeoPage(page, title, description, keywords, author) {
    document.getElementById('popupPage').innerText = page.toUpperCase();
    document.getElementById('popupTitle').innerText = title;
    document.getElementById('popupDescription').innerText = description;
    document.getElementById('popupKeywords').innerText = keywords;
    document.getElementById('popupAuthor').innerText = author;
    
    document.getElementById('seoPopup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('seoPopup').style.display = 'none';
}
</script>

<!-- Styles -->
<style>
/* Popup Styling */

</style>
@endsection
