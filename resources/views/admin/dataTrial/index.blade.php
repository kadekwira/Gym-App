@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Trial</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{route('data-trial.create')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th >
                      No
                    </th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date trial</th>
                    <th>Strart trial</th>
                    <th>End trial</th>
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
                    <td>{{$data->full_name}}</td> 
                    <td>{{$data->email}}</td> 
                    <td>{{$data->phone}}</td> 
                    <td>{{$data->date_trial}}</td> 
                    <td>{{$data->start_trial}}</td> 
                    <td>{{$data->end_trial}}</td> 
                    <td>
                      <a href="https://wa.me/+62{{$data->phone}}/?text=HI! Tunjukan Pesan ini ke office gym! %0A Nama : {{$data->full_name}} %0A Date Trial : {{$data->date_trial}} %0A Start Trial : {{$data->start_trial}} %0A End Trial : {{$data->end_trial}}" target="_blank" class="btn btn-icon btn-success"><i class="fa-brands fa-whatsapp"></i></a>

                      <a href="{{route('data-trial.edit',$data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                      <a onclick="confirmDelete(this)" data-url="{{route('data-trial.destroy',$data->id)}}" class="btn btn-icon btn-danger text-white"><i class="fas fa-trash"></i></a>
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