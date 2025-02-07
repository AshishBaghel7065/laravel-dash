@extends('layouts.dashboard')

@section('content')

<h3 class="p-2">Appointments</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:5%">#</th>
                        <th style="width:25%">Name</th>
                        <th style="width:20%">Phone</th>
                        <th style="width:25%">Email</th>
                        <th style="width:15%">Appointment Date</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $appointments = [
                            ['name' => 'John Doe', 'phone' => '+1 123 456 7890', 'email' => 'john@example.com', 'date' => '2024-08-30'],
                            ['name' => 'Jane Smith', 'phone' => '+1 987 654 3210', 'email' => 'jane@example.com', 'date' => '2024-09-02'],
                            ['name' => 'Mike Johnson', 'phone' => '+1 555 666 7777', 'email' => 'mike@example.com', 'date' => '2024-09-10']
                        ];
                    @endphp
                    @foreach ($appointments as $index => $appointment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $appointment['name'] }}</td>
                        <td>{{ $appointment['phone'] }}</td>
                        <td>{{ $appointment['email'] }}</td>
                        <td>{{ $appointment['date'] }}</td>
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
