@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kategori Class</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{route('tipe-class.create')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
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
                    <th>Name Kategori</th>
                    <th>Description</th>
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
                    <td>
                      @if ($data->type_image=="img")
                          <img src="{{ asset($data->image) }}" alt="Foto {{ $data->nama_kategori }}" width="20px">
                      @else
                          {!!$data->image!!}
                      @endif
                  </td>
                    <td >{{$data->nama_kategori}}</td> 
                    <td>{!!$data->description!!}</td> 
                    <td>
                      <a href="{{route('tipe-class.edit',$data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                      <a onclick="confirmDelete(this)" data-url="{{route('tipe-class.destroy',$data->id)}}" class="btn btn-icon btn-danger text-white"><i class="fas fa-trash"></i></a>
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