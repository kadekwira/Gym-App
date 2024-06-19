@extends('layouts-user.app')
@section('content')
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Get Healthy Body with the Perfect Exercises</h1>
                <p>Join us and start your fitness journey today!</p>
                @auth
                <div class="group">
                    <a href="{{ route('qrcode.generate') }}" class="btn btn-danger" style="font-size:16px; width:100px;">Qr Code</a>
                </div>
                @else
                <div class="group">
                    <a href="{{route('register.member')}}" class="btn btn-danger">Join Membership</a>
                    <a href="https://www.youtube.com/channel/YourChannelID" class="btn btn-video" target="_blank">
                        <i class="fas fa-play"></i>
                        <span>Watch Videos</span>
                    </a>
                </div>
                @endauth
                
     
                <section class="stats">
                    <div class="stat">
                        <h3>{{$trainer}}+</h3>
                        <p>Expert Trainers</p>
                    </div>
                    <div class="line"></div>
                    <div>
                        <h3>{{$member}}+</h3>
                        <p>Members Joined</p>
                    </div>
                    <div class="line"></div>
                    <div>
                        <h3>{{$kelas}}+</h3>
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
                @auth
                @else
                <a href="{{route('freetrial.index')}}" class="btn">Free Trial Today</a>
                @endauth
            </div>
        </div>
       
    </div>
</section>

<section id="classes" class="class">
    <div class="container">
        <h2>The Best Programs We Offer For You</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ratione iusto, enim saepe mollitia vero labore omnis illum totam! Accusamus.</p>

        <div class="class-cards">
            @foreach ($kategoriClass as $item)
                @if ($item->type_image=="img")
                    <div class="class-card" data-class="bodybuilding">
                        <img src="{{ asset($item->image) }}" alt="bodybuilding">
                        <h3>Body Building</h3>
                        <p>Achieve your bodybuilding goals with customized plans.</p>
                    </div>
                @else
                <div class="class-card" data-class="strength">
                     {!!$item->image!!}
                    <h3>{{$item->nama_kategori}}</h3>
                    {!!$item->description!!}
                </div>
                @endif
            @endforeach

        </div>
    </div>
</section>


<section class="plans">
    <div class="container">
        <h2>Choose The Best Plan</h2>
        <p>Choose a plan that works best for your fitness goals. Enjoy flexibility in making changes.</p>
        <div class="plan-cards monthly">
            @forelse ($kategori as $data)
                <div class="plan-card">
                    <h3>{{$data->title}}</h3>
                    <p>@rupiah($data->price_member) Per {{$data->by}}</p>
                    {!!$data->description!!}
                </div>
                
            @empty
                
            @endforelse
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
            </div>
        </div>
    </div>
</section>



<section class="testimonials">
    <div id="testimonials" class="container">
        <div class="testimonial-header">
            <h2 class="section-title">What Our Happy Clients Say About Us</h2>
        </div>
        <div class="testimonial-content">
            <div class="testimonial-text">
                <p>Read through the experiences shared by our clients and see how we have helped them achieve their fitness goals.</p>
                <div class="caterpillar">
                    <div class="plus-container">
                        <div class="description">
                            <span class="star">⭐</span>
                            <span class="text">4.9/5.0 Reviews</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-carousel">
                <button class="carousel-control prev"><i class="fa-solid fa-angle-left"></i></button>
                <div class="testimonial-cards">
                    <div class="testimonial-card active">
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/img/gym1.jpg') }}" alt="Client Photo">
                            <div class="author-info">
                                <h4>Fatimah Siti</h4>
                                <p>★★★★★</p>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <p>“Fitneskia has transformed my life! The trainers are amazing and the programs are tailored to fit my needs.”</p>
                        </div>
                    </div>
                    <div class="testimonial-card ">
                        <div class="testimonial-author">
                            <img src="{{ asset('assets/img/gym2.jpg') }}" alt="Client Photo">
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
                <button class="carousel-control next"><i class="fa-solid fa-angle-right"></i></button>
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
@section('addJavascript')
    <script>
        let currentIndex = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.testimonial-card');
  if (index >= slides.length) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = slides.length - 1;
  } else {
    currentIndex = index;
  }

  slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === currentIndex);
  });
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

document.querySelector('.carousel-control.next').addEventListener('click', nextSlide);
document.querySelector('.carousel-control.prev').addEventListener('click', prevSlide);

showSlide(currentIndex);
    </script>
@endsection