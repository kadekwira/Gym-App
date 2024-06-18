@extends('layouts.layoutAdmin')
@section('content')

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaction</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th>
                      No
                    </th>
                    <th>Member</th>
                    <th>Total</th>
                    <th>Date Time</th>
                    <th>Descrption</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>      
                  @php
                      $no=1;
                  @endphp         
                  @foreach ($transactions as $data)                      
                  <tr class="text-center">
                    <td>
                      {{$no}}
                    </td>
                    <td>{{$data->user->first_name." ".$data->user->last_name}}</td> 
                    <td>@rupiah($data->total)</td> 
                    <td>{{$data->date_time}}</td> 
                    <td>{{$data->desctiption}}</td> 
                    <td>{{$data->payment_method}}</td> 
                    <td>
                      <span class="badge {{$data->status == 'pending' ? 'badge-danger' : 'badge-success'}}">{{$data->status}}</span>
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