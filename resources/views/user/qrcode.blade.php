@extends('layouts-user.app')

@section('content')
<section class="class">
    <div class="container" style="width:100%;">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <h2>Scann QrCode At Gym</h2>
            <div class="bg-light p-5">
                {!! $qrCode !!}
            </div>
        </div>
    </div>
</section>
@endsection
