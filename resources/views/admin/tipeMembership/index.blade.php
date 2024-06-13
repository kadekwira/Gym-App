@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Tipe Membership</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{route('tipe-membership.create')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="d-flex align-items-center">
              @forelse ($datas as $data)
              <div class="card card-primary">
                <div class="card-header">
                  <h4>Member <span>{{$data->title}}</span></h4>
                  <div class="card-header-action">
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle">Options</a>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i> Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p> <span style="font-weight: 800;">@rupiah($data->price_member)</span> / {{$data->by}}</p>
                    {!!$data->description!!}
                  <p>Total : <span style="font-weight: 800;">@rupiah($data->price_member * $data->duration_member)</span></p>
                </div>
              </div>
                  
              @empty
              <div class="d-flex justify-content-center">
                <p class="text-center">Data Kosong!</p>
              </div>
              @endforelse
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