<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
  </head>
  <body>

 <header>
    <h4 class="title-header">
        <i class="fa-solid fa-dumbbell"></i>
        <span>FITNES</span>
    </h4>
    <nav>
        <a href="" class="active">Home</a>
        <a href="{{ route('class.index') }}">Class</a>
        <a href="">Trainer</a>
        <a href="{{ route('freetrial.index') }}">Free Trial</a>
        @auth
        <a href="">QrCode</a>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Profile
          </a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('member.profile') }}">show Profile</a></li>
            <li><a class="dropdown-item" href="">Notification</a></li>
            <li><a class="dropdown-item" href="{{ route('login') }}">Logout</a></li>
          </ul>
        </div>
            @else
                <a href="{{ route('login') }}" class="button-signIn">Sign In</a>
            @endauth
    </nav>
 </header>

 