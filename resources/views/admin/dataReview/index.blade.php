@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Review</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{route('createReview')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
          </div>
          <div class="card-body">
            @if (Session::has('message'))
              <script>
                swal("Success", "{{Session::get('message')}}", 'success', {
                  button: true,
                  button: "OK",
                });
              </script>
            @endif
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th>ID User</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reviewgym as $data)
                    <tr>
                      <td class="text-center align-middle">{{$data->user_id}}</td>
                      <td class="text-center align-middle">{{$user[$data->user_id]->first_name}}</td>
                      <td class="text-center align-middle">{{$user[$data->user_id]->last_name}}</td>
                      <td class="text-center align-middle">
                        @for ($x = 0; $x < $data->rating; $x++)
                        ★
                        @endfor
                      </td>
                      <td class="align-right">{!!$data->comment!!}</td>
                      <td class="text-center align-middle">
                        <div class="button">
                          <a href="{{route('editReview', $data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                          <button onclick="confirmDelete({{$data->id}})" class="btn btn-icon btn-danger text-white"><i class="fa-solid fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>
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
<script src="{{asset('newAdmin/dist/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $(function() {
    $('#tableDataAdmin').DataTable()
  })

  function confirmDelete(id) {
        swal({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then(function (willDelete) {
            if (willDelete) {
                // Redirect langsung ke rute deleteReview
                window.location.href = "{{ route('deleteReview', ['reviewgym' => ':id']) }}".replace(':id', id);
            }
        });
    }
</script>
@endsection