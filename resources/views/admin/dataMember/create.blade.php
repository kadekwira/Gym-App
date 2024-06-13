@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Members</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{route('data-member.store')}}">
            @csrf
            <div class="card-header">
              <h4>Add Data Member</h4>
            </div>
            <div class="card-body row">
              <div class="col-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" required=""
                  name="first_name"
                  >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" required=""
                  name="last_name"
                  >
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" required=""
                  name="email">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" required=""
                  name="password">
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" name="phone">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" class="form-control" name="date_of_birth">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Membership </label>
                  <select class="form-control" id="membership_type_id" name="membership_type_id" required>
                    <option value="">Select Membership Type</option>
                    @foreach($tipe as $data)
                        <option value="{{ $data->id }}" data-duration="{{ $data->duration_member }}">{{ $data->title }}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Member Start</label>
                  <input type="date" class="form-control" name="membership_start" id="membership_start">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Member End</label>
                  <input type="date" class="form-control" name="membership_end" id="membership_end" readonly>
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
 document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('membership_start').addEventListener('change', function() {
        updateMembershipEndDate();
    });

    document.getElementById('membership_type_id').addEventListener('change', function() {
        updateMembershipEndDate();
    });

    function updateMembershipEndDate() {
        let startDate = new Date(document.getElementById('membership_start').value);
        let membershipTypeSelect = document.getElementById('membership_type_id');
        let selectedOption = membershipTypeSelect.options[membershipTypeSelect.selectedIndex];
        let duration = selectedOption.getAttribute('data-duration');

        if (!isNaN(startDate.getTime()) && duration) {
            let endDate = new Date(startDate);
            endDate.setMonth(endDate.getMonth() + parseInt(duration));
            let endDateString = endDate.toISOString().split('T')[0];
            console.log(endDateString);
            document.getElementById('membership_end').value = endDateString;
        } else {
            document.getElementById('membership_end').value = '';
        }
    }
});
  </script>
@endsection