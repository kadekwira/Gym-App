@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Trainer</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{ route('data-trainer.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Edit Data Trainer</h4>
            </div>
            <div class="card-body row">
              <div class="col-12">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="trainer_photo_old" value="{{ $data->trainer_photo }}">
                  <div id="photo-preview-container" style="display: {{ $data->trainer_photo ? 'block' : 'none' }}">
                    <img id="photo-preview" src="{{ $data->trainer_photo ? asset('storage/' . $data->trainer_photo) : '' }}" alt="your image" style="display: {{ $data->trainer_photo ? 'block' : 'none' }}"/>
                    <button type="button" id="remove-photo" class="btn btn-sm btn-danger" style="display: {{ $data->trainer_photo ? 'inline-block' : 'none' }}"><i class="fas fa-times"></i></button>
                  </div>
                  <label>Foto</label>
                  <input type="file" class="form-control" name="trainer_photo" accept="image/*">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Trainer Name</label>
                  <input type="text" class="form-control" required name="trainer_name" value="{{ $data->trainer_name }}">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="number" class="form-control" required name="phone_number" value="{{ $data->phone_number }}">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" required name="email" value="{{ $data->email }}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" required name="address" value="{{ $data->address }}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Experience</label>
                  <input type="text" class="form-control" name="experience" value="{{ $data->experience }}">
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('addCss')
<style>
  #photo-preview-container {
      position: relative;
      width: 200px; 
      height: 200px; 
      overflow: hidden;
      margin-bottom: 10px;
  }
  #photo-preview {
      display: block;
      width: 100%;
      height: 100%;
      border-radius: 50%;
  }
  #remove-photo {
      position: absolute;
      top: 2px;
      right: 2px;
  }
</style>
@endsection

@section('addJavascript')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var input = document.querySelector('input[name="trainer_photo"]');
      var previewContainer = document.getElementById('photo-preview-container');
      var preview = document.getElementById('photo-preview');
      var removeButton = document.getElementById('remove-photo');
      var oldPhoto = "{{ $data->trainer_photo ? asset('storage/' . $data->trainer_photo) : '' }}";

      // Tampilkan foto lama saat halaman dimuat
      if (oldPhoto) {
          preview.src = oldPhoto;
          previewContainer.style.display = 'block';
          preview.style.display = 'block';
          removeButton.style.display = 'inline-block';
      }

      input.addEventListener('change', function(event) {
          var reader = new FileReader();
          reader.onload = function() {
              preview.src = reader.result;
              previewContainer.style.display = 'block';
              preview.style.display = 'block';
              removeButton.style.display = 'inline-block';
          };
          reader.readAsDataURL(event.target.files[0]);
      });

      removeButton.addEventListener('click', function() {
          preview.src = oldPhoto;
          previewContainer.style.display = oldPhoto ? 'block' : 'none';
          preview.style.display = oldPhoto ? 'block' : 'none';
          removeButton.style.display = oldPhoto ? 'inline-block' : 'none';
          input.value = '';
      });
  });
</script>
@endsection
