@extends('layouts.dashboard')

@section('content')

<div class="add-poster">
    <h3 class="p-2">Manage Posters</h3>
</div>

<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:10%">Sr. No</th>
                        <th style="width:70%">Poster Image</th>
                        <th style="width:20%">Action</th>
                    </tr>
                </thead>
                <tbody>@php
                    $posters = [
                        (object) ['id' => 1, 'posterimage' => 'posters/sample1.jpg'],
                        (object) ['id' => 2, 'posterimage' => 'posters/sample2.jpg'],
                        (object) ['id' => 3, 'posterimage' => 'posters/sample3.jpg'],
                    ];
                    @endphp
                    
                    @foreach ($posters as $index => $poster)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $poster->posterimage) }}" alt="Poster" style="width:100px; height:auto;">
                        </td>
                        <td>
                            <div class="action-container">
                                <a href="{{ asset('storage/' . $poster->posterimage) }}" class="view-btn" target="_blank">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                {{-- href="{{ route('dashboard.poster.edit', $poster->id) }}" --}}
                                <a  class="edit-btn">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="#" class="delete-btn" onclick="openDeleteModal({{ $poster->id }})">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                {{-- action="{{ route('dashboard.poster.delete', $poster->id) }}" --}}
                                <form id="deleteForm{{ $poster->id }}"  method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
