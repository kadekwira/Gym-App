@extends('layouts-user.app')

@section('content')
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Get Healthy Body with the Perfect Exercises</h1>
                <p>Join us and start your fitness journey today!</p>
                <a href="/register" class="btn btn-red">Get Started</a>
                <a href="https://www.youtube.com/channel/YourChannelID" class="btn btn-video" target="_blank">
                    <i class="fas fa-play"></i> Watch Videos
                </a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('assets/img/hero.jpg') }}" alt="Hero Image">
            </div>
        </div>
    </div>
</section>

<section id="classes" class="class">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">The Best Programs We Offer For You</h2>
            <p class="section-description">Practice anywhere at any time, and explore a variety of exercises that suit your needs. Our programs are designed to help you achieve your fitness goals with ease and flexibility.</p>
        </div>
        <div class="class-cards">
            <div class="class-card" data-class="strength">
                <i class="fa-solid fa-dumbbell"></i>
                <h3>Strength Training</h3>
                <p>Build muscle strength and endurance with our expert trainers.</p>
            </div>
            <div class="class-card" data-class="yoga">
                <i class="fa-solid fa-person-yoga"></i>
                <h3>Body Yoga</h3>
                <p>Relax and strengthen your body with our yoga sessions.</p>
            </div>
            <div class="class-card" data-class="bodybuilding">
                <i class="fas fa-user"></i>
                <h3>Body Building</h3>
                <p>Achieve your bodybuilding goals with customized plans.</p>
            </div>
            <div class="class-card" data-class="weightloss">
            <i class="fa-solid fa-person-running"></i>
                <h3>Weight Loss</h3>
                <p>Effective weight loss programs to get you in shape.</p>
            </div>
        </div>
    </div>
</section>

<!-- Hidden modals for detailed descriptions -->
<div id="class-detail-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <div class="modal-body">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>




<section class="plans">
    <div class="container">
        <h2>Choose The Best Plan</h2>
        <div class="plan-cards">
            <div class="plan-card">
                <h3>Beginner</h3>
                <p>$99 Per Month</p>
                <ul>
                    <li>5 Gym Access</li>
                    <li>Personal Trainer</li>
                    <li>Standard Options</li>
                    <li>One Year Membership</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
            <div class="plan-card popular">
                <h3>Lifetime</h3>
                <p>$299 Per Month</p>
                <ul>
                    <li>All Gym Access</li>
                    <li>Personal Trainer</li>
                    <li>VIP Options</li>
                    <li>Lifetime Membership</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
            <div class="plan-card">
                <h3>Professional</h3>
                <p>$199 Per Month</p>
                <ul>
                    <li>20 Gym Access</li>
                    <li>Personal Trainer</li>
                    <li>Premium Options</li>
                    <li>Five Year Membership</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="container">
        <h2>What Our Happy Clients Say About Us</h2>
        <div class="testimonial">
            <p>"Gym-App has changed my life. The trainers are professional and the atmosphere is great!"</p>
            <p>- John Doe</p>
        </div>
    </div>
</section>
@endsection
