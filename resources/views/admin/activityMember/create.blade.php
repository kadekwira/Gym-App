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
                        <h4>Add Activity Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tableDataAdmin">
                                <thead>
                                    <tr class="text-center">
                                        <th>ID User</th>
                                        <th>Date</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="scannedData"></tbody>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <button id="saveScanBtn" class="btn btn-primary">Submit</button>
                        </div>
                        <video id="preview" style="width: 50%"></video>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('addJavascript')

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

<script type="text/javascript">
    let scannedResults = [];

    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        console.log(content);
        // Menampilkan hasil scan kedalam tabel
        displayScannedData(content);
    });
    Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });

    function displayScannedData(content) {
        let scanDate = getCurrentDate();
        let startTime = getCurrentTime();
        let newRow = `
            <tr>
                <td>${content}</td>
                <td>${scanDate}</td>
                <td>${startTime}</td>
                <td>null</td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">Hapus</button>
                </td>
            </tr>    
        `;
        document.getElementById('scannedData').innerHTML += newRow;

        // Menambahkan hasil scan kedalam array sementara
        scannedResults.push({
            user_id: content,
            date: scanDate,
            check_in: startTime,
            check_out: null
        });
    }

    function getCurrentDate() {
        let date = new Date();
        return `${date.getFullYear()}-${(date.getMonth()+1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
    }

    function getCurrentTime() {
        let date = new Date();
        return `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}:${date.getSeconds().toString().padStart(2, '0')}`;
    }

    function removeRow(button) {
        let row = button.closest('tr');
        let index = row.rowIndex - 1;
        scannedResults.splice(index, 1);
        row.remove();
    }

    // Proses saat klik simpan
    document.getElementById('saveScanBtn').addEventListener('click', function() {
        saveScanToDatabase();
    });

    function saveScanToDatabase() {
        console.log(scannedResults);

        // Mengirim data ke server
        axios.post('{{route('saveActivity')}}', {
            scans: scannedResults
        })
        .then(function (response) {
            console.log(response.data);
            alert('Scan berhasil disimpan kedalam database.');
        })
        .catch(function (error) {
            console.error(error);
            alert('Terjadi kesalahan menyimpan data');
        });
    }
</script>

<script>
    $(function () {
        $('#tableDataAdmin').DataTable()
    })
</script>
@endsection