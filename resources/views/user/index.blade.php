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


<section class="class">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">The Best Programs We Offer For You</h2>
            <p class="section-description">Practice anywhere at any time, and explore a variety of exercises that suit
                your needs. Our programs are designed to help you achieve your fitness goals with ease and flexibility.
            </p>
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
        <p>Choose a plan that works best for your fitness goals. Enjoy flexibility in making changes.</p>
        <div class="plan-cards">
            <div class="plan-card">
                <h3>Discoveri</h3>
                <p>$99 Per Month</p>
                <ul>
                    <li>5 Gym Access</li>
                    <li>Special Events</li>
                    <li>Basic Training</li>
                    <li>Group Classes</li>
                    <li>Customer Support</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
            <div class="plan-card popular">
                <h3>Lifetime</h3>
                <p>$299 Per Month</p>
                <ul>
                    <li>5 Classes per Week</li>
                    <li>Personal Trainer</li>
                    <li>Individual Training</li>
                    <li>Lifetime Membership</li>
                    <li>Physical Examination</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
            <div class="plan-card">
                <h3>Professional</h3>
                <p>$199 Per Month</p>
                <ul>
                    <li>20 Gym Access</li>
                    <li>Personal Trainer</li>
                    <li>8 Classes per Month</li>
                    <li>Individual Training</li>
                    <li>Monthly Fitness Report</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="testimonial-header">
            <h2 class="section-title">What Our Happy Clients Say About Us</h2>
        </div>
        <div class="testimonial-content">
            <div class="testimonial-text">
                <p>Read through the experiences shared by our clients and see how we have helped them achieve their
                    fitness goals.</p>
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
                            <p>“Fitneskia has transformed my life! The trainers are amazing and the programs are
                                tailored to fit my needs.”</p>
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
                            <p>“The best fitness program I've ever joined. The flexibility and variety are unbeatable!”
                            </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control next" onclick="nextSlide()">❯</button>
            </div>
        </div>
    </div>
</section>


<button class="chatbot-toggler">
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