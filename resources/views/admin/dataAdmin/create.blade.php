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
          <form method="post" action="{{route('data-admin.store')}}">
            @csrf
            <div class="card-header">
              <h4>Add Data Admin</h4>
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
                  <label>Role</label>
                  <select  class="form-control" name="role">
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
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