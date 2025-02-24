@extends('layouts.dashboard')

@section('content')
<style>
.container-dashboard {
    padding: 20px;
    background: #f8f9fa;
}
.add-container h4 {
    font-size: 1.5rem;
    font-weight: bold;
}
.seo-drop select {
    width: 100%;
    padding: 10px;
    border: 1px solid  black;
    border-radius: 5px;
}
.seo-box input,
.seo-box textarea {
    width: 100%;
    padding: 30px 10px;
    background-color: rgb(243, 243, 243);
    margin-bottom: 10px;
    border: 1px solid  white !important;
    border-radius: 5px;
}

.table-box2 {
    margin-top: 20px;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>
<div class="dashboard">
    <div class="container">
       <div class="row">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-8">
            <div class="seo-box">
                <h4 class="primary-color mx-3" id="seoTitleDisplay">Title</h4>

                <input type="text" id="seoFullTitle" placeholder="Update website's Title">
                <textarea id="seoDescription" placeholder="Update Description"></textarea>
                <input type="text" id="seoKeywords" placeholder="Update website's Keywords">
                <input type="text" id="seoAuthor" placeholder="Update website's Author">

                <button class="submit-btn" id="updateSeoBtn">Update Now</button>
            </div>
        </div>
       </div>
    </div>
</div>
<h3 class="text-3xl mt-3 font-semibold mb-6">SEO Metadata</h3>

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
                    <?php
                    $seo_metadata = [
                        [
                            "id" => 1,
                            "page" => "home",
                            "title" => "Best SEO Services | Grow Your Business Online",
                            "meta_description" => "Boost your website traffic and rank higher with our expert SEO services. Increase visibility and get more leads today!",
                            "meta_keywords" => "SEO services, digital marketing, website ranking, search engine optimization",
                            "author" => "John Doe"
                        ],
                        [
                            "id" => 2,
                            "page" => "about",
                            "title" => "About Us | Expert SEO & Digital Marketing Team",
                            "meta_description" => "Learn about our SEO and digital marketing experts who help businesses achieve online success with proven strategies.",
                            "meta_keywords" => "SEO experts, digital marketing team, SEO agency, online marketing",
                            "author" => "Jane Smith"
                        ],
                        [
                            "id" => 3,
                            "page" => "services",
                            "title" => "SEO Services | On-Page & Off-Page Optimization",
                            "meta_description" => "We offer complete SEO services including on-page optimization, link building, keyword research, and content marketing.",
                            "meta_keywords" => "on-page SEO, off-page SEO, link building, keyword research, content marketing",
                            "author" => "David Brown"
                        ]
                    ];
                    ?>
                    @foreach ($seo_metadata as $index => $seo)
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
                    @endforeach
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

@endsection
