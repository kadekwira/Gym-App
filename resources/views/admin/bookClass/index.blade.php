@extends('layouts.layoutAdmin')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Book Class</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">
                        @forelse ($classes as $class)
                        @php
                            // Format schedule using Carbon
                            $schedule = \Carbon\Carbon::parse($class->schedule)->translatedFormat('l, j F Y H:i');
                            
                            // Define badge classes based on status
                            $badgeClasses = [
                                'Open' => 'badge-success',
                                'Closed' => 'badge-danger',
                            ];
                            $badgeClass = $badgeClasses[$class->status] ?? 'badge-default'; // Default to 'badge-default' if status not found
                        @endphp

                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $class->image) }}" class="card-img-top" alt="{{ $class->class_name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $class->class_name }}</h5>

                                    <div class="d-flex flex-column">
                                        <div class="mb-2">
                                            <span style="font-weight:600;">Tanggal</span> : <span>{{ $schedule }}</span>
                                        </div>
                                        <div class="mb-2">
                                            <span style="font-weight:600;">Trainer</span> : <span>{{ $class->trainer->trainer_name }}</span>
                                        </div>
                                        <div class="mb-2">
                                            <span style="font-weight:600;">Kapasitas</span> : <span>{{ $class->bookings_count }} / {{ $class->capacity }}</span>
                                        </div>
                                        <div class="mb-2">
                                            <span style="font-weight:600;">Status</span> :
                                            <span class="badge {{ $badgeClass }}">{{ $class->status }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('booking.showMemberClass', ['id' => $class->id]) }}" class="btn btn-primary mt-3">List Daftar Member</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <h6 class="text-center">Data Kosong</h6>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
