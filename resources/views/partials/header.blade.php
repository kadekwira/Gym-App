<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  </head>
  <body>

 <header>
    <h4 class="title-header">
        <i class="fa-solid fa-dumbbell"></i>
        <span>FITNES</span>
    </h4>
    <nav>
        <a href="" class="active">Home</a>
        <a href="">About Us</a>
        <a href="">Class</a>
        <a href="">Membership</a>
        <a href="testimonials">Testimonial</a>
        @auth
        <a href="#" class="qrcode-link">QR Code</a>
                <div class="qrcode">
                    <img src="{{ asset('assets/img/qrcode.png') }}" alt="QR Code">
                </div>
                <a href="" class="profile-link">Profile</a>
                <a href="" class="notifications-link">Notifications</a>
                <a href="" class="logout-button">Logout</a>
            @else
                <a href="{{ route('login') }}" class="button-signIn">Sign In</a>
            @endauth
    </nav>
 </header>
