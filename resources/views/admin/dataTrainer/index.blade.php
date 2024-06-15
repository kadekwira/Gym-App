@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Trainer</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{route('data-trainer.create')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th >
                      No
                    </th>
                    <th>Foto</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Experience</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @php
                      $no=1;
                  @endphp         
                      
                  @foreach ($trainers as $data)                      
                  <tr class="text-center">
                    <td>
                      {{$no}}
                    </td>
                    <td>
                      @if ($data->trainer_photo)
                          <img src="{{ asset('storage/' . $data->trainer_photo) }}" alt="Foto {{ $data->trainer_name }}" width="40px">
                      @else
                          <span>Tidak ada foto</span>
                      @endif
                  </td>
                    <td >{{$data->trainer_name}}</td> 
                    <td>{{$data->email}}</td> 
                    <td>{{$data->phone_number}}</td> 
                    <td>{{$data->address}}</td> 
                    <td>{{$data->experience}}</td> 
                    <td>
                      <a href="{{route('data-trainer.edit',$data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                      <a onclick="confirmDelete(this)" data-url="{{route('data-trainer.destroy',$data->id)}}" class="btn btn-icon btn-danger text-white"><i class="fas fa-trash"></i></a>
                    </form>
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
<script src="{{asset('js/sweetalert.min.js')}}"></script>
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
  confirmDelete = function(button) {
    let url = $(button).data('url');
    swal({
      title: 'Konfirmasi Hapus',
      text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    }).then(function(value) {
      if (value) {
        $.ajax({
          url: url,
          type: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          success: function(result) {
            swal('Data berhasil dihapus!', {
              icon: 'success',
            }).then(() => {
              location.reload();
            });
          },
          error: function(xhr) {
            swal('Data gagal dihapus!', {
              icon: 'error',
            });
          }
        });
      }
    });
  }
</script>
@endsection