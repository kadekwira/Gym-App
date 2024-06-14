@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Admin</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{route('data-admin.update',$data->id)}}">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Edit Data Admin</h4>
            </div>
            <div class="card-body row">
              <div class="col-6">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" required=""
                  name="first_name" value="{{$data->first_name}}"
                  >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" required=""
                  name="last_name"  value="{{$data->last_name}}"
                  >
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" required=""
                  name="email"  value="{{$data->email}}">
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" name="phone"  value="{{$data->phone}}">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Role</label>
                  <select  class="form-control" name="role">
                    <option value="Super Admin" {{ $data->role == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                  </select>
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

@endsection