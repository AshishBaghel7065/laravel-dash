@extends('layouts.dashboard')

@section('content')

<h3 class="p-2">Achievements</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:10%">Sr. No</th>
                        <th style="width:60%">Achievement Title</th>
                        <th style="width:20%">Number</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $achievements = [
                            ['title' => 'Projects Completed', 'number' => 150],
                            ['title' => 'Happy Clients', 'number' => 120],
                            ['title' => 'Awards Won', 'number' => 15],
                            ['title' => 'Years of Experience', 'number' => 10]
                        ];
                    @endphp
                    @foreach ($achievements as $index => $achievement)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $achievement['title'] }}</td>
                        <td>{{ $achievement['number'] }}</td>
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
