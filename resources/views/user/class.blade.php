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

    <div class="card">
        <img src="{{ asset('assets/img/hit.jpg') }}" alt="HIIT Class">
        <div class="card-overlay">
        <div class="strength-classes">STRENGTH CLASSES</div>
            <h2>HIIT</h2>
            <div class="card-details">
                <div class="intensity-duration">
                <i class="fa-solid fa-dumbbell"></i>
                    <span class="intensity">MODERATE</span>
                </div>
                <div class="intensity-duration-container">
                    <span class="duration">60 MIN</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <img src="{{ asset('assets/img/core.jpg') }}" alt="Core Class">
        <div class="card-overlay">
        <div class="strength-classes">STRENGTH CLASSES</div>
            <h2>CORE</h2>
            <div class="card-details">
                <div class="intensity-duration">
                <i class="fa-solid fa-dumbbell"></i>
                    <span class="intensity">MODERATE</span>
                </div>
                <div class="intensity-duration-container">
                    <span class="duration">60 MIN</span>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection