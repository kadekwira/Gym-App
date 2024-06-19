@extends('layouts.layoutAdmin')
@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Member</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            @if (auth()->guard('admin')->user()->role!='Admin')
            <a href="{{route('data-member.create')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
            <a  href="{{route('checkMembership')}}"  class="btn btn-icon btn-info ml-2 button-header-add"><i class="fas fa-user-check"></i> </a>
            @else
            <a  href="{{route('checkMembership')}}"  class="btn btn-icon btn-info ml-auto button-header-add"><i class="fas fa-user-check"></i> </a>
            @endif

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th>
                      No
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Mebership End</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>      
                  @php
                      $no=1;
                  @endphp         
                  @foreach ($datas as $data)                      
                  <tr class="text-center">
                    <td>
                      {{$no}}
                    </td>
                    <td>{{$data->first_name ." ". $data->last_name}}</td> 
                    <td>{{$data->email}}</td> 
                    <td>{{$data->phone}}</td> 
                    <td>{{$data->membership_end}}</td> 
                    <td>
                      <span class="badge {{$data->status == 'inactive' ? 'badge-danger' : 'badge-success'}}">{{$data->status}}</span>
                    </td>
                    <td>
                      @if (auth()->guard('admin')->user()->role!='Admin')
                      <button  data-id="{{ $data->id }}" class="btn btn-icon btn-info btn-detail"><i class="far fa-eye"></i></button>
                      <a href="{{route('data-member.edit',$data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                      @else
                      <button  data-id="{{ $data->id }}" class="btn btn-icon btn-info btn-detail"><i class="far fa-eye"></i></button>
                      @endif

                    </td>
                  </tr>
                  @php
                   $no++;   
                  @endphp
                  @endforeach                          
                </tbody>
              </table>
            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

<style>
      .modal-dialog {
        width: 50% !important;
    }
  .modal-body .form-group {
      margin-bottom: 20px;
  }
  .modal-body .fw-bold {
      font-weight: bold;
  }
  .modal-body .form-control {
      background-color: #f3f4f6;
      border: none;
      padding: 10px;
      border-radius: 5px;
  }
</style>

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

<script>
  $('.btn-detail').click(function(){
    let id = $(this).data("id");
    let url = '{{ route("data-member.show", ":id") }}';
    url = url.replace(':id', id);
    $(this).fireModal({
        title: 'Detail Member',
        body: '<div class="row">' +
                  '<div class="col-12">' +
                      '<div class="form-group">' +
                          '<h6 for="first_name" class="fw-bold">Name:</h6>' +
                          '<p id="name" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-6">' +
                      '<div class="form-group">' +
                          '<label for="email" class="fw-bold">Email:</label>' +
                          '<p id="email" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-6">' +
                      '<div class="form-group">' +
                          '<label for="phone" class="fw-bold">Phone:</label>' +
                          '<p id="phone" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-12">' +
                      '<div class="form-group">' +
                          '<label for="address" class="fw-bold">Address:</label>' +
                          '<p id="address" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-12">' +
                      '<div class="form-group">' +
                          '<label for="date_of_birth" class="fw-bold">Tanggal Lahir:</label>' +
                          '<p id="date_of_birth" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-12">' +
                      '<div class="form-group">' +
                          '<label for="membership_type_id" class="fw-bold">Tipe Member:</label>' +
                          '<p id="membership_type_id" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-6">' +
                      '<div class="form-group">' +
                          '<label for="membership_start" class="fw-bold">Member Start:</label>' +
                          '<p id="membership_start" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-6">' +
                      '<div class="form-group">' +
                          '<label for="membership_end" class="fw-bold">Member Berakhir:</label>' +
                          '<p id="membership_end" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
                  '<div class="col-12">' +
                      '<div class="form-group">' +
                          '<label for="status" class="fw-bold">Status:</label>' +
                          '<p id="status" class="form-control"></p>' +
                      '</div>' +
                  '</div>' +
              '</div>',
        center: true,
        created: function(modal) {
            $.ajax({
                url: url,
                method: "GET",
                success: function(response) {
                    $('#name').text(response.first_name + " " + response.last_name);
                    $('#email').text(response.email);
                    $('#phone').text(response.phone);
                    $('#address').text(response.address);
                    $('#date_of_birth').text(response.date_of_birth);
                    $('#membership_type_id').text(response.membership_type.title);
                    $('#membership_start').text(response.membership_start);
                    $('#membership_end').text(response.membership_end);
                    $('#status').text(response.status);
                },
                error: function(xhr, status, error) {
                    modal.find('.modal-body').html("Failed to load data.");
                }
            });
        },
    });

  })
</script>


@endsection