@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Trial</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{route('data-trial.update',$data->id)}}">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Edit Data Trial</h4>
            </div>
            <div class="card-body row">
              <div class="col-5">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" required=""
                  name="full_name" value="{{$data->full_name}}"
                  >
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" required=""
                  name="email" value="{{$data->email}}">
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" name="phone" value="{{$data->phone}}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Date Trial</label>
                  <input type="date" class="form-control" name="date_trial" id="date_trial" value="{{$data->date_trial}}" readonly>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Start Trial</label>
                  <input type="time" class="form-control" name="start_trial" readonly id="start_trial " value="{{$data->start_trial}}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>End Trial</label>
                  <input type="time" class="form-control" name="end_trial" readonly id="end_trial " value="{{$data->end_trial}}">
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </section>
</div>
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