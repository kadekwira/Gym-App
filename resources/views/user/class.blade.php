@extends('layouts-user.app')

@section('content')

<section class="class">
    <div class="container">
        <h2>The Best Programs We Offer For You</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ratione iusto, enim saepe mollitia vero labore omnis illum totam! Accusamus.</p>
        <div class="class-cards">
            <div class="class-card" data-class="strength">
                <i class="fas fa-dumbbell"></i>
                <h3>Strength Training</h3>
                <p>Build muscle strength and endurance with our expert trainers.</p>
            </div>
            <div class="class-card" data-class="yoga">
                <i class="fa-solid fa-person-praying"></i>
                <h3>Body Yoga</h3>
                <p>Relax and strengthen your body with our yoga sessions.</p>
            </div>
            <div class="class-card" data-class="bodybuilding">
            <img src="{{ asset('assets/img/bodybuilding.png') }}" alt="bodybuilding">
                <h3>Body Building</h3>
                <p>Achieve your bodybuilding goals with customized plans.</p>
            </div>
            <div class="class-card" data-class="weightloss">
                <i class="fas fa-weight"></i>
                <h3>Weight Loss</h3>
                <p>Effective weight loss programs to get you in shape.</p>
            </div>
        </div>
    </div>
</section>

<main>
    <h1>Explore All Classes</h1>
    <div class="container">
        <div class="d-flex gap-3 flex-wrap">
            @forelse ($classes as $class)
            @php
                $schedule = \Carbon\Carbon::parse($class->schedule)->translatedFormat('l, j F Y H:i');
                
                $badgeClasses = [
                    'Open' => 'badge-success',
                    'Closed' => 'badge-danger',
                ];
                $badgeClass = $badgeClasses[$class->status] ?? 'badge-default'; // Default to 'badge-default' if status not found
            @endphp
                       <div class="card card-custom" style="width: 20rem;">
                           <img src="{{ asset('storage/' . $class->image) }}" class="card-img-top" alt="{{ $class->class_name }}" height="200px">
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
                                       <span style="font-weight:600;">Kapasitas</span> : <span>{{ $class->bookings_count }} /{{$class->capacity }}</span>
                                   </div>
                                   <div class="mb-2">
                                       <span style="font-weight:600;">Status</span> :
                                       <span class="badge {{ $badgeClass }}">{{ $class->status }}</span>
                                   </div>
                               </div>
                               @auth
                                @if (!$class->user_has_booked)
        
                                        <form action="{{ route('class.booking', ['id' => $class->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                            <button type="submit" class="btn btn-primary" style="background-color: #F2212F !important; border:none;">Book Class</button>
                                        </form>
                                        
                                @endif
                               @endauth
                           </div>
                          </div>
            @empty
                <p>No classes available.</p>
            @endforelse
        </div>
    </div>
</main>

@endsection
