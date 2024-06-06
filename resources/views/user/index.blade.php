@extends('layouts-user.app')

@section('content')

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Get Healthy Body with the Perfect Exercises</h1>
                <p>Join us and start your fitness journey today!</p>
                <div class="group">
                    <a href="/register" class="btn btn-danger">Join Membership</a>
                    <a href="https://www.youtube.com/channel/YourChannelID" class="btn btn-video" target="_blank">
                        <i class="fas fa-play"></i>
                        <span>Watch Videos</span>
                    </a>
                </div>
                <section class="stats">
                    <div class="stat">
                        <h3>105+</h3>
                        <p>Expert Trainers</p>
                    </div>
                    <div class="line"></div>
                    <div>
                        <h3>970+</h3>
                        <p>Members Joined</p>
                    </div>
                    <div class="line"></div>
                    <div>
                        <h3>135+</h3>
                        <p>Fitness Programs</p>
                    </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('assets/img/test.png') }}" alt="Hero Image">
            </div>
        </div>
    </div>
</section>


<section id="classes" class="class">
    <div class="container">
        <h2>The Best Programs We Offer For You</h2>
        <div class="class-cards">
            <div class="class-card" data-class="strength">
                <i class="fas fa-dumbbell"></i>
                <h3>Strength Training</h3>
                <p>Build muscle strength and endurance with our expert trainers.</p>
            </div>
            <div class="class-card" data-class="yoga">
                <i class="fas fa-spa"></i>
                <h3>Body Yoga</h3>
                <p>Relax and strengthen your body with our yoga sessions.</p>
            </div>
            <div class="class-card" data-class="bodybuilding">
                <i class="fas fa-user"></i>
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

<!-- Hidden modals for detailed descriptions -->
<div id="class-detail-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <div class="modal-body">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>

<section class="trusted-partners">
    <div class="container">
        <p>1k More Trusted Companies Partner</p>
        <img src="{{ asset('assets/img/bener.jpg') }}" alt="Partner Logos">
    </div>
</section>



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

<button id="chatbot-toggler" class="chatbot-toggler">
    <span class="material-symbols-outlined">mode_comment</span>
    <span class="material-symbols-outlined">close</span>
</button>
<div id="chatbot" class="chatbot">
    <!-- Header Chatbot -->
    <header id="chatbot-header">
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined">close</span>
    </header>

    <!-- Title Chatbot -->
    <ul id="chatbox" class="chatbox">
        <li class="chat incoming">
            <span class="material-symbols-outlined">smart_toy</span>
            <p>
                Halo, <br />
                Berikan pertanyaan Anda!
            </p>
        </li>
    </ul>

    <!-- Chat Input -->
    <div id="chatbot-input" class="chat-input">
        <textarea placeholder="Berikan pertanyaan.." required></textarea>
        <span id="send-btn" class="material-symbols-outlined">send</span>
    </div>
</div>



@endsection