<style>
    .timetable input{
        height: 22px;
    }
</style>

<div class="add-poster mt-5">
    <h3 class="p-2">Manage Time Table</h3>
</div>

<div class="dashboard">
    <div class="container">
        <div class="row">
            
            <form method="POST" action="{{ route('dashboard.timetable.update') }}" >
                @csrf
           <div class="table-box timetable">
            <table class="table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Opening Time</th>
                        <th>Closing Time</th>
                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($globalTimetable as $timetable)
                    <tr>
                        <td>{{ $timetable->day }}</td>
                        <td>
                            <input type="time" name="timetable[{{ $timetable->id }}][opening_time]"
                                   value="{{ $timetable->opening_time }}" 
                                   class="form-control opening-time">
                        </td>
                        <td>
                            <input type="time" name="timetable[{{ $timetable->id }}][closing_time]"
                                   value="{{ $timetable->closing_time }}" 
                                   class="form-control closing-time">
                        </td>
                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
                <button type="submit" class="submit-btn">Save Changes</button>
            </form>
        </div>
    </div>
</div>

