@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Information Gym</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('createInformation')}}"
                            class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <script>
                                swal("Success", "{{ Session::get('message') }}", 'success', {
                                    button: true,
                                    button: "OK",
                                });
                            </script>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableDataAdmin">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Gym Name</th>
                                        <th>Location Gym</th>
                                        <th>Open Operational</th>
                                        <th>Close Operational</th>
                                        <th>Operational Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $i = 1
                                    @endphp
                                    @foreach ($informationgym as $data)
                                        <tr>
                                            <td class="text-center align-middle">{{ $i++ }}</td>
                                            <td class="text-center align-middle">{{ $data->gym_name }}</td>
                                            <td class="text-center align-middle">{{ $data->gym_location }}</td>
                                            <td class="text-center align-middle">{{ $data->open_operational }}</td>
                                            <td class="text-center align-middle">{{ $data->close_operational }}</td>
                                            <td class="text-center align-middle">{{ $data->operational_time }}</td>
                                            <td class="text-center align-middle">
                                                <div class="button">
                                                    <a href="{{ route('editInformation', $data->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                    <button onclick="confirmDelete({{ $data->id }})"
                                                        class="btn btn-icon btn-danger"><i class="fa-solid fa-trash"></i></button>
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

<!-- Data Table -->
@section('addCss')
<link rel="stylesheet" href="{{asset('newAdmin/dist/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet"
    href="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet"
    href="{{asset('newAdmin/dist/assets/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
@endsection

@section('addJavascript')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/datatables.min.js')}}"></script>
<script
    src="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
    $(function () {
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
                // Redirect langsung ke rute deleteInformation
                window.location.href = "{{ route('deleteInformation', ['informationgym' => ':id']) }}".replace(':id', id);
            }
        });
    }

</script>

@endsection