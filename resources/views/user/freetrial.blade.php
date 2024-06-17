@extends('layouts-user.app') 

@section('content')
<section class="freetrial-container">
<div class="container">
    <h2>Free Trial Form</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
    <form action="{{ route('trial.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="date_trial">Date Trial</label>
            <input type="date" class="form-control" id="date_trial" name="date_trial" required>
        </div>
        <div class="form-group">
            <label for="start_trial">Start Trial</label>
            <input type="time" class="form-control" id="start_trial" name="start_trial" required>
        </div>
        <div class="form-group">
            <label for="end_trial">End Trial</label>
            <input type="time" class="form-control" id="end_trial" name="end_trial" required>
        </div>
        <button type="submit" class="btn btn-danger">Submit</button>
    </form>
    </div>
</div>
</section>
@endsection
