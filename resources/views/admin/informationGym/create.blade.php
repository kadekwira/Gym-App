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
                    <form action="{{route('saveInformation')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Add Information Gym</h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Gym Name</label>
                                    <input type="text" class="form-control" required="" name="gym_name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Gym Location</label>
                                    <input type="text" class="form-control" required="" name="gym_location">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Open Operational</label>
                                    <input type="time" class="form-control" name="open_operational"
                                        id="open_operational">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Close Operational</label>
                                    <input type="time" class="form-control" name="close_operational"
                                        id="close_operational">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Operational Time</label>
                                    <input type="int" class="form-control" name="operational_time" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('addJavascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menambahkan perubahan jam buka atau jam tutup
        document.getElementById('open_operational').addEventListener('change', updateOperationalTime);
        document.getElementById('close_operational').addEventListener('change', updateOperationalTime);

        function updateOperationalTime() {
            var openTime = document.getElementById('open_operational').value;
            var closeTime = document.getElementById('close_operational').value;
            // Menghitung selisih waktu
            var diffHours = Math.abs(new Date("1970-01-01 " + closeTime) - new Date("1970-01-01 " + openTime)) / 36e5;
            // Menampilkan hasil perhitungan
            document.querySelector('input[name="operational_time"]').value = diffHours + " Hours";
        }
    });
</script>

@endsection