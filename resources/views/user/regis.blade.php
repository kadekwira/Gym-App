@extends('layouts-user.app')

@section('content')
<section class="class">
    <div class="container" style="width:100%;">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <h2>Join Membership</h2>
            <form id="wizardForm" class="card-custom p-4 rounded text-white mt-3 w-50" action="{{ route('saveStep1') }}" method="post">
                @csrf
                <div id="step1" class="wizard-step">
                    <div class="col-12 mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="membership_type_id" class="form-label">Membership Type</label>
                        <select class="form-select" id="membership_type_id" name="membership_type_id" required>
                            <option value="">Choose Membership Type</option>
                            @foreach($datas as $type)
                                <option value="{{ $type->id }}" data-price="{{ $type->price_member * $type->duration_member }}" 
                                    data-duration="{{ $type->duration_member }}">
                                    {{ $type->title }} - @rupiah($type->price_member * $type->duration_member) 
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="membership_start" class="form-label">Membership Start</label>
                        <input type="date" class="form-control" id="membership_start" name="membership_start" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="membership_end" class="form-label">Membership End</label>
                        <input type="date" class="form-control" id="membership_end" name="membership_end" readonly>
                    </div>
                    <button id="pay-button" type="button" class="btn btn-primary">Proceed to Payment</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // Fungsi untuk menampilkan harga sesuai dengan tipe keanggotaan yang dipilih
    document.getElementById('membership_type_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        var title = selectedOption.innerText.split(' - ')[0]; // Ambil judul membership
        var duration = parseInt(selectedOption.getAttribute('data-duration'));

        // Set membership end date based on membership start and duration
        var startDate = new Date(document.getElementById('membership_start').value);
        if (!isNaN(startDate.getTime())) {
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() + duration);
            document.getElementById('membership_end').valueAsDate = endDate;
        }
    });

    document.getElementById('membership_start').addEventListener('change', function() {
        var startDate = new Date(this.value);
        var duration = parseInt(document.getElementById('membership_type_id').options[document.getElementById('membership_type_id').selectedIndex].getAttribute('data-duration'));
        if (!isNaN(startDate.getTime())) {
            var endDate = new Date(startDate);
            endDate.setMonth(startDate.getMonth() + duration);
            document.getElementById('membership_end').valueAsDate = endDate;
        }
    });

    // Event listener untuk tombol pembayaran
    document.getElementById('pay-button').addEventListener('click', function() {
        // Validasi form sebelum submit
        if (validateForm()) {
            $.ajax({
                url: "{{ route('saveStep1') }}",
                method: "POST",
                data: $('#wizardForm').serialize(),
                success: function(response) {
                    // Redirect ke halaman pembayaran Snap
                    snap.pay(response.snapToken, {
                        onSuccess: function(result) {
                            console.log('Payment successful:', result);
                            handleMidtransCallback(result);
                        },
                        onPending: function(result) {
                            console.log('Payment pending:', result);
                            // Handle pembayaran tertunda (opsional)
                        },
                        onError: function(result) {
                            console.log('Payment error:', result);
                            // Handle error pembayaran (opsional)
                        }
                    });
                },
                error: function(err) {
                    console.error('Error:', err);
                }
            });
        } else {
            console.log('Form validation failed');
            // Handle validasi form gagal (opsional)
        }
    });

    // Fungsi validasi form
    function validateForm() {
        // Implementasikan validasi form sesuai kebutuhan
        return true; // Contoh sederhana, return true jika form valid
    }

    function handleMidtransCallback(result) {
    $.ajax({
        url: "{{ route('midtransCallback') }}",
        method: "POST",
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {
            transaction_status: result.transaction_status,
            order_id: result.order_id,
            payment_type: result.payment_type
        },
        success: function(response) {
            console.log('Callback handled successfully:', response);
            // Redirect ke halaman index atau halaman lain sesuai kebutuhan
            window.location.href = "{{ route('dashboard.user') }}";
        },
        error: function(err) {
            console.error('Error handling callback:', err);
            // Handle error callback (opsional)
        }
    });
}
</script>
@endsection
