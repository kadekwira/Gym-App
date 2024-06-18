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
                            <table class="table table-bordered">
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
                        <video id="preview" style="width: 20%"></video>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('addJavascript')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
                <td class="text-center">${content}</td>
                <td class="text-center">${scanDate}</td>
                <td class="text-center">${startTime}</td>
                <td class="text-center">...</td>
                <td class="text-center">
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

        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

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

@endsection