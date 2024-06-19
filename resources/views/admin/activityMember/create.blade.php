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
                    <div class="card-body w-50 h-50">
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="reader" width="600"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('addJavascript')
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="html5-qrcode.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let lastResult = '';

function onScanSuccess(decodedText, decodedResult) {
    console.log(decodedResult);

    // Capture the current date and tim
    sendScanData(decodedText);
}

function onScanFailure(error) {
    // Handle scan failure if necessary
}

function sendScanData(scanData) {
    $.ajax({
        url: "{{route('saveActivity')}}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: scanData,
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function(response) {
            swal({
                    title: 'Sukses',
                    text: 'Data Tersimpan',
                    icon: 'success',
                }).then(function() {
                   
                    window.location.href = "{{ route('activityMember') }}";
                });
            
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            alert('Data Gagal Di Simpan');
        }
    });
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection
