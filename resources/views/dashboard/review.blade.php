@extends('layouts.dashboard')

@section('content')

<h3 class="p-2">User Reviews</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:15%">User Image</th>
                        <th style="width:15%">Username</th>
                        <th style="width:20%">User Details</th>
                        <th style="width:30%">Review</th>
                        <th style="width:10%">Stars</th>
                        <th style="width:7%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $reviews = [
                            [
                                'user_image' => 'user1.jpg',
                                'username' => 'John Doe',
                                'user_detail' => 'Software Developer at ABC Corp.',
                                'review' => 'Great service and support. Highly recommended!',
                                'stars' => 5
                            ],
                            [
                                'user_image' => 'user2.jpg',
                                'username' => 'Jane Smith',
                                'user_detail' => 'Digital Marketer at XYZ Ltd.',
                                'review' => 'Very satisfied with the product. Would buy again!',
                                'stars' => 4
                            ]
                        ];
                    @endphp
                    @foreach ($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img src="{{ asset('images/' . $review['user_image']) }}" alt="User Image" width="50" class="rounded-circle"></td>
                        <td>{{ $review['username'] }}</td>
                        <td>{{ $review['user_detail'] }}</td>
                        <td>{{ $review['review'] }}</td>
                        <td>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa{{ $i <= $review['stars'] ? 's' : 'r' }} fa-star" style="color: gold;"></i>
                            @endfor
                        </td>
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
