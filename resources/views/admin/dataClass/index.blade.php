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
            <a href="{{route('data-class.create')}}" class="btn btn-icon btn-success ml-auto button-header-add"><i class="fas fa-plus"></i></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="tableDataAdmin">
                <thead>                                 
                  <tr class="text-center">
                    <th >
                      #
                    </th>
                    <th>Class Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Trainer</th>
                    <th>Kategori</th>
                    <th>Schedule</th>
                    <th>Duration</th>
                    <th>Capacity</th>
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
                    <td>{{$data->class_name}}</td>
                    <td>{!!$data->description!!}</td>
                    <td>{{$data->class_price}}</td>
                    <td>{{$data->trainer->trainer_name}}</td>
                    <td>{{$data->kategori_class->nama_kategori}}</td>
                    <td>{{$data->schedule}}</td>
                    <td>{{$data->duration_minutes}}</td>
                    <td>{{$data->capacity}}</td>
                    <td>
                      @php
                        $badgeClasses = [
                          'open' => 'badge-success',
                          'close' => 'badge-danger',
                        ];
                        $badgeClass = $badgeClasses[$data->status] ?? 'badge-default'; 
                      @endphp
                      <span class="badge {{ $badgeClass }}">{{ $data->status }}</span>
                    </td>
                    <td>
                      <a href="{{route('data-class.edit',$data->id)}}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
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