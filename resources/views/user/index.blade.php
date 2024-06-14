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

<section class="trial-container">
    <div class="container">
        <div class="trial-content">
            <div class="image">
                <img src="{{ asset('assets/img/trial.jpg') }}" alt="Professional Trainer">
                <div class="badge">
                    <img src="{{ asset('assets/img/dumble.png') }}" alt="">
                    <span>Professional Trainer</span>
                </div>
            </div>
            <div class="text-content">
                <h1>Get Ready To Reach Your Fitness Goals</h1>
                <p>We are a gym that is committed to helping people reach their fitness goals. We offer a variety of fitness programs and services to fit your needs, whether you are a beginner or a pro.</p>
                <p>We believe that everyone should have access to the benefits of exercise. Make it happen.</p>
                <a href="#" class="btn">Free Trial Today</a>
            </div>
        </div>
    </div>
</section>

<section id="classes" class="class">
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

<!-- Hidden modals for detailed descriptions -->
<div id="class-detail-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <div class="modal-body">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
</div>

<section  class="plans">
    <div class="container">
        <h2>Choose The Best Plan</h2>
        <p>Choose a plan that works best for your fitness goals. Enjoy flexibility in making changes.</p>
        <div class="plan-cards">
            <div class="plan-card">
                <h3 class="fw-bold">12 Bulan</h3>
                <p>Rp. <span class="fw-bold">300.000</span> /Bulan</p>
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
        <div class="testimonial-header">
            <h2 class="section-title">What Our Happy Clients Say About Us</h2>
        </div>
        <div class="testimonial-content">
            <div class="testimonial-text">
                <p>Read through the experiences shared by our clients and see how we have helped them achieve their fitness goals.</p>
            </div>
            <div class="testimonial-carousel">
                <button class="carousel-control prev" onclick="prevSlide()">❮</button>
                <div class="testimonial-cards">
                    <div class="testimonial-card">
                    <div class="testimonial-author">
                            <img src="{{ asset('assets/img/profile1.jpg') }}" alt="Client Photo">
                            <div class="author-info">
                                <h4>Fatimah Siti</h4>
                                <p>★★★★★</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <p>“Fitneskia has transformed my life! The trainers are amazing and the programs are tailored to fit my needs.”</p>
                        </div>
                    </div>
                    <div class="testimonial-card">
                    <div class="testimonial-author">
                            <img src="{{ asset('assets/img/profile2.jpg') }}" alt="Client Photo">
                            <div class="author-info">
                                <h4>John Doe</h4>
                                <p>★★★★★</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <p>“The best fitness program I've ever joined. The flexibility and variety are unbeatable!”</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control next" onclick="nextSlide()">❯</button>
            </div>
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