@extends('layouts-user.app')

@section('content')
<section class="class">
    <div class="container" style="width:100%;">
        <div class="d-flex justify-content-center flex-column align-items-center">
            <h2>Our Trainer</h2>
            <div class="d-flex justify-content-center align-items-center gap-3">
                @forelse ($trainers as $data)
                <div class="card card-custom p-4" style="width: 14rem;">
                  <img src="{{asset('storage/'.$data->trainer_photo)}}" class="card-img-top" alt="..."  height="150px" width="120px">
                  <div class="card-body">
                      <div class="d-flex flex-column">
                        <div class="mb-2 text-white">
                            <span style="font-weight:600;">Nama</span> : <span>{{ $data->trainer_name }}</span>
                        </div>
                        <div class="mb-2 text-white">
                            <span style="font-weight:600;">Address</span> : <span>{{ $data->address }}</span>
                        </div>
                        <div class="mb-2 text-white">
                            <span style="font-weight:600;">Experience</span> : <span>{{ $data->experience }}</span>
                        </div>
                    </div>
                  </div>
                </div>
                  @empty
                      <p>Data Kosong</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
