@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Book Class</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{route('booking.store')}}" >
            @csrf
            <div class="card-header">
              <h4>Add Data Book Class</h4>
            </div>
            <div class="card-body row">
              <div class="col-12">
                <div class="form-group">
                  <label>Class Name</label>
                  <input type="text" class="form-control" required=""
                  name="class_name" value="{{$class->class_name}}" readonly
                  >
                  <input type="hidden" class="form-control" required=""
                  name="class_id" value="{{$class->id}}" readonly
                  >
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Member </label>
                  <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Select Member</option>
                    @foreach($users as $data)
                        <option value="{{ $data->id }}">{{ $data->first_name." ". $data->last_name}}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Booking Date</label>
                  <input type="datetime-local" class="form-control" name="booking_date">
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




@section('addCss')
@endsection
@section('addJavascript')

@endsection