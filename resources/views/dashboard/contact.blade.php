@extends('layouts.dashboard')

@section('content')
<h1 class="text-3xl font-semibold mb-6">SEO Metadata</h1>

<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:12%">Page</th>
                        <th style="width:12%">Title</th>
                        <th style="width:15%">Meta Description</th>
                        <th style="width:15%">Meta Keywords</th>
                        <th style="width:15%">Author</th>
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
                            <button onclick="viewContact('{{ $seo['author'] }}')" class="view-btn">
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
                <p><strong>Author:</strong> <span id="modal-name"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
function viewContact(author) {
    document.getElementById('modal-name').textContent = author;
    document.getElementById('contactModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('contactModal').style.display = 'none';
}
</script>

@endsection
