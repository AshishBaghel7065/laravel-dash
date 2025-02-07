@extends('layouts.dashboard')

@section('content')

<h3 class="p-2">About Us</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:5%">#</th>
                        <th style="width:20%">Title</th>
                        <th style="width:20%">Image</th>
                        <th style="width:20%">Small Description</th>
                        <th style="width:25%">Big Description</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $aboutData = [
                            [
                                'title' => 'About Our Company',
                                'image' => 'images/about.jpg',
                                'small_description' => 'We provide cutting-edge digital solutions.',
                                'big_description' => 'With years of experience, we specialize in web and mobile development, delivering top-notch solutions worldwide.'
                            ],
                            [
                                'title' => 'Our Vision',
                                'image' => 'images/vision.jpg',
                                'small_description' => 'Empowering businesses with innovative tech.',
                                'big_description' => 'Our vision is to be a globally recognized tech company known for innovation, reliability, and excellence.'
                            ]
                        ];
                    @endphp
                    @foreach ($aboutData as $index => $about)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $about['title'] }}</td>
                        <td>
                            <img src="{{ asset($about['image']) }}" alt="About Image" class="img-thumbnail" width="80">
                        </td>
                        <td>{{ $about['small_description'] }}</td>
                        <td>{{ Str::limit($about['big_description'], 50) }}</td>
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
