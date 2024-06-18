@extends('layouts-user.app') 

@section('content')
<section class="freetrial-container">
<div class="container">
    <h2>Free Trial Form</h2>

    <div class="form-container">
        <form action="{{ route('freetrial.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Whatsapp</label>
                <input type="number" class="form-control" id="phone" name="phone" required placeholder="ex : 6281213230640">
            </div>
            <div class="form-group">
                <label for="date_trial">Date Trial</label>
                <input type="date" class="form-control" id="date_trial" name="date_trial" required>
            </div>
            <div class="form-group">
                <label>Start Trial</label>
                <select class="form-control" name="start_trial" id="start_trial" style="background-color:#333!important; color:white; border:none;">

                </select>
            </div>
            <div class="form-group">
                <label for="end_trial">End Trial</label>
                <input type="time" class="form-control" id="end_trial" name="end_trial" required readonly style="background-color:#333!important">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>
</section>
@endsection
@section('addJavascript')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const dateField = document.getElementById('date_trial');
      const today = new Date().toISOString().split('T')[0];

      dateField.setAttribute('min', today);
  });
</script>

<script>
       document.addEventListener('DOMContentLoaded', function() {
            const timeField = document.getElementById('start_trial');
            const now = new Date();

            const currentHours = now.getHours();
            const currentMinutes = now.getMinutes();

            // Define opening and closing times
            const openingHours = 7; // 07:00
            const closingHours = 23-2; // 23:00

            // Generate time options
            for (let hour = openingHours; hour <= closingHours; hour++) {
                for (let minute = 0; minute < 60; minute += 15) {
                    const option = document.createElement('option');
                    const formattedHour = String(hour).padStart(2, '0');
                    const formattedMinute = String(minute).padStart(2, '0');
                    const timeValue = `${formattedHour}:${formattedMinute}`;

                    // Skip past times
                    if (hour < currentHours || (hour === currentHours && minute < currentMinutes)) {
                        continue;
                    }

                    option.value = timeValue;
                    option.textContent = timeValue;
                    timeField.appendChild(option);
                }
            }
        });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      const startTimeField = document.getElementById('start_trial');
      const endTimeField = document.getElementById('end_trial');

      startTimeField.addEventListener('change', function() {
          const startTime = startTimeField.value;

          if (startTime) {
              const [hours, minutes] = startTime.split(':');
              let endTimeHours = parseInt(hours) + 1;
              const endTimeMinutes = minutes;

              if (endTimeHours < 10) {
                  endTimeHours = `0${endTimeHours}`;
              } else if (endTimeHours >= 24) {
                  endTimeHours = '00';
              }

              const endTime = `${endTimeHours}:${endTimeMinutes}`;
              endTimeField.value = endTime;
          }
      });
  });
</script>
@endsection