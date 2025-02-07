@extends('layouts.dashboard')

@section('content')
<h3 class="p-2">Contact</h3>
<div class="dashboard">
    <div class="container">
        <div class="table-box">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:6%">Sr. No</th>
                        <th style="width:12%">Name</th>
                        <th style="width:15%">Mobile</th>
                        <th style="width:15%">Email</th>
                        <th style="width:15%">Date of Appointment</th>
                        <th style="width:22%">Message</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $contacts = [
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                            ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'], ['name' => 'John Doe', 'mobile' => '9876543210', 'email' => 'john@example.com', 'appointment_date' => '2025-02-10', 'message' => 'Need consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultationNeed consultation'],
                            ['name' => 'Jane Smith', 'mobile' => '9123456780', 'email' => 'jane@example.com', 'appointment_date' => '2025-02-12', 'message' => 'Follow-up inquiry'],
                            ['name' => 'Alice Brown', 'mobile' => '9988776655', 'email' => 'alice@example.com', 'appointment_date' => '2025-02-15', 'message' => 'Project discussion'],
                        ];
                    @endphp
                    @foreach ($contacts as $index => $contact)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $contact['name'] }}</td>
                        <td>{{ $contact['mobile'] }}</td>
                        <td>{{ $contact['email'] }}</td>
                        <td>{{ $contact['appointment_date'] }}</td>
                        <td class="msg">{{ $contact['message'] }}</td>
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

