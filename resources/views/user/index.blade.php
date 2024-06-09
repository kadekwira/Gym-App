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
                <div class="badge"><img src="{{ asset('assets/img/dumble.png') }}" alt=""> Professional Trainer</div>
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

<section  class="class">
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
                <img src="{{ asset('assets/img/yoga.png') }}" alt="yoga">
                <h3>Body Yoga</h3>
                <p>Relax and strengthen your body with our yoga sessions.</p>
            </div>
            <div class="class-card" data-class="bodybuilding">
            <img src="{{ asset('assets/img/bodybuilding.png') }}" alt="bodybuilding">
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
        <div class="plan-duration">
            <button class="duration-btn" id="toggleDuration">Monthly</button>
        </div>
        <div class="plan-cards monthly">
            <div class="plan-card">
                <h3>Discover</h3>
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
        <div class="plan-cards annual" style="display: none;">
            <div class="plan-card">
            <h3>Discover</h3>
                <p>$999 Per Year</p>
                <ul>
                    <li>Access to All Branches</li>
                    <li>Special Events</li>
                    <li>Basic Training Program</li>
                    <li>Unlimited Group Classes</li>
                    <li>24/7 Customer Support</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
            <div class="plan-card popular">
            <h3>Lifetime</h3>
                <p>$2999 Per Year</p>
                <ul>
                    <li>5 Personal Training Sessions per Week</li>
                    <li>Dedicated Personal Trainer</li>
                    <li>Customized Nutrition Plan</li>
                    <li>Lifetime Membership</li>
                    <li>Annual Physical Examination</li>
                </ul>
                <a href="#" class="btn">Choose Plan</a>
            </div>
            <div class="plan-card">
            <h3>Professional</h3>
                <p>$1999 Per Year</p>
                <ul>
                    <li>Unlimited Gym Access</li>
                    <li>Personal Trainer</li>
                    <li>2 Classes per Week</li>
                    <li>Customized Individual Training</li>
                    <li>Quarterly Fitness Report</li>
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
                <p>Read through the experiences shared by our clients and see how we have helped them achieve their fitness goals.</p>
        <div class="caterpillar">
        <img src="{{ asset('assets/img/profile1.jpg') }}"  alt="Circle 1" class="circle">
        <img src="{{ asset('assets/img/profile1.jpg') }}"  alt="Circle 2" class="circle">
        <img src="{{ asset('assets/img/profile1.jpg') }}" alt="Circle 3" class="circle">
        <img src="{{ asset('assets/img/profile1.jpg') }}"  alt="Circle 4" class="circle">
        <div class="plus-container">
                <div class="circle plus">+</div>
                <div class="description">
                    <span class="star">⭐</span>
                    <span class="text">peroved</span>
                </div>
            </div>
        </div>
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


@endsection
