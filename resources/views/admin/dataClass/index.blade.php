@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Class</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="#" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th >
                      #
                    </th>
                    <th>Task Name</th>
                    <th>Progress</th>
                    <th>Members</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>                                 
                  <tr class="text-center">
                    <td>
                      1
                    </td>
                    <td>Create a mobile app</td>
                    <td class="align-middle">
                      <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                        <div class="progress-bar bg-success" data-width="100%"></div>
                      </div>
                    </td>
                    <td>
                      <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                    </td>
                    <td>2018-01-20</td>
                    <td><div class="badge badge-success">Completed</div></td>
                    <td>
                      <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                      <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection



{{-- dataTables --}}
@section('addCss')
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('addJavascript')
<script src="{{asset('newAdmin/dist/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $(function() {
    $('#tableDataAdmin').DataTable()
  })
</script>
@endsection