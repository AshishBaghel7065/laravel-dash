@extends('layouts.dashboard')

@section('content')
<h3 class="text-3xl mt-3 font-semibold mb-6">Update Metadata</h3>

<div class="dashboard">
    
    <div class="container">
        
       <div class="row">
        <div class="col-lg-4 py-3">
            <h6>Drop Down For Soe Page</h6>
            <select id="seoPageSelect" class="w-100 my-2 border px-2">
                <option value="" selected disabled>Select Page</option>
                {{-- @foreach ($seoPages as $page)
                    <option value="{{ $page->page }}">{{ ucfirst($page->page) }}</option>
                @endforeach --}}
            </select>
        </div>
        <div class="col-lg-8">
            <div class="seo-box">
                <h4 class="primary-color my-2" id="seoTitleDisplay">Page Title</h4>
                <label>Website Title</label>
                <input type="text" id="seoFullTitle" placeholder="Update website's Title">
                <label>Meta Description</label>
                <textarea id="seoDescription" placeholder="Update Description"></textarea>
                <label>Meta Keywords</label>
                <input type="text" id="seoKeywords" placeholder="Update website's Keywords">
                <label>Website Author</label>
                <input type="text" id="seoAuthor" placeholder="Update website's Author">
                <button class="submit-btn" id="updateSeoBtn">Update Now</button>
            </div>
        </div>
       </div>
    </div>
</div>
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
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($soes as $soe)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $seo['page'] }}</td>
                        <td>{{ $seo['title'] }}</td>
                        <td>{{ $seo['meta_description'] }}</td>
                        <td>{{ $seo['meta_keywords'] }}</td>
                        <td class="msg">{{ $seo['author'] }}</td>
                        <td>
                            <button onclick="viewContact('{{ $seo['page'] }}','{{ $seo['title'] }}','{{ $seo['meta_description'] }}','{{ $seo['meta_keywords'] }}','{{ $seo['author'] }}')" class="view-btn">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for Viewing Details -->
<div class="modal" id="contactModal" style="display: none;">
    <div class="view-popup">
        <div class="viewpopup-content">
            <div class="close-btn" onclick="closeModal()">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>
            <h5 class="mx-3">Author Detail</h5>
            <div class="popup-body">
                <p><strong>Author:</strong> <span id="modal-page"></span></p>
                <p><strong>Author:</strong> <span id="modal-title"></span></p>
                <p><strong>Author:</strong> <span id="modal-meta_description"></span></p>
                <p><strong>Author:</strong> <span id="modal-meta_keywords"></span></p>
                <p><strong>Author:</strong> <span id="modal-author"></span></p>

            </div>
        </div>
    </div>
</div>

<script>
function viewContact(page,title,meta_description,meta_keywords,author) {
    document.getElementById('modal-page').textContent = page;
    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-meta_description').textContent = meta_description;
    document.getElementById('modal-meta_keywords').textContent = meta_keywords;
    document.getElementById('modal-author').textContent = author;
    document.getElementById('contactModal').style.display = 'block';
}
function closeModal() {
    document.getElementById('contactModal').style.display = 'none';
}
</script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    const selectPage = document.getElementById("seoPageSelect");
    const seoTitleDisplay = document.getElementById("seoTitleDisplay");
    const seoFullTitle = document.getElementById("seoFullTitle");
    const seoDescription = document.getElementById("seoDescription");
    const seoKeywords = document.getElementById("seoKeywords");
    const seoAuthor = document.getElementById("seoAuthor");
    const updateButton = document.getElementById("updateSeoBtn");

    selectPage.addEventListener("change", function () {
        const selectedPage = this.value;
        
        fetch(`/soe/${selectedPage}`)
            .then(response => response.json())
            .then(data => {
                if (data) {
                    seoTitleDisplay.textContent = data.title || "No Title Found";
                    seoFullTitle.value = data.title || "";
                    seoDescription.value = data.meta_description || "";
                    seoKeywords.value = data.meta_keywords || "";
                    seoAuthor.value = data.author || "";
                }
            })
            .catch(error => console.error("Error fetching SEO data:", error));
    });

    updateButton.addEventListener("click", function () {
        const selectedPage = selectPage.value;
        if (!selectedPage) {
            alert("Please select a page first!");
            return;
        }

        const updatedData = {
            title: seoFullTitle.value,
            meta_description: seoDescription.value,
            meta_keywords: seoKeywords.value,
            author: seoAuthor.value
        };

        fetch(`/soe/update/${selectedPage}`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(updatedData)
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error("Error updating SEO data:", error));
    });
});

    </script>
    

@endsection
