@extends('layouts.dashboard')

@section('content')
    <h3 class="p-2">Blogs</h3>
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
                        @php
                            $blogs = [
                                ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'],
                                ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'], ['image' => 'blog1.jpg', 'title' => 'Web Development Trends', 'description' => 'Latest trends in web development for 2025...', 'publish_date' => '2025-01-15', 'category' => 'Web Development'],
                                ['image' => 'blog2.jpg', 'title' => 'SEO Strategies', 'description' => 'Best SEO practices for ranking...', 'publish_date' => '2025-02-01', 'category' => 'Digital Marketing'],
                            ];
                        @endphp
                        @foreach ($blogs as $index => $blog)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{ asset('images/' . $blog['image']) }}" alt="Blog Image" width="50"></td>
                            <td>{{ $blog['title'] }}</td>
                            <td>{{ $blog['description'] }}</td>
                            <td>{{ $blog['publish_date'] }}</td>
                            <td>{{ $blog['category'] }}</td>
                            <td>
                                <div class="btn-container">
                                    <a href="#" class="view-btn"><i class="fa-regular fa-eye"></i></a>
                                    <a href="#" class="view-btn"><i class="fa-solid fa-pen"></i></a>
                                    <a href="#" class="delete-btn" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @endsection
