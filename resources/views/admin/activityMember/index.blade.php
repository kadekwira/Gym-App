@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Activity Member</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('createActivity')}}"
                            class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableDataAdmin">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Check In</th>
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
                                  <td>{{$data->user->first_name ." ". $data->user->last_name}}</td> 
                                  <td>{{$data->check_in}}</td> 
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
<script src="{{asset('newAdmin/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('newAdmin/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
    $(function () {
        $('#tableDataAdmin').DataTable()
    })
</script>

@endsection
