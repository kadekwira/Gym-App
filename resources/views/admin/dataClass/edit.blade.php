@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Class</h1>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <form method="post" action="{{ route('data-class.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header">
              <h4>Edit Data Class</h4>
            </div>
            <div class="card-body row">
              <div class="col-12">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="image_old" value="{{ $data->image }}">
                  <div id="photo-preview-container" style="display: {{ $data->image ? 'block' : 'none' }}">
                    <img id="photo-preview" src="{{ $data->image ? asset('storage/' . $data->image) : '' }}" alt="your image" style="display: {{ $data->image ? 'block' : 'none' }}"/>
                    <button type="button" id="remove-photo" class="btn btn-sm btn-danger" style="display: {{ $data->image ? 'inline-block' : 'none' }}"><i class="fas fa-times"></i></button>
                  </div>
                  <label>Foto</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/*">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Class Name</label>
                  <input type="text" class="form-control" required="" name="class_name" value="{{ $data->class_name }}">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Schedule</label>
                  <input type="datetime-local" class="form-control" name="schedule" value="{{ $data->schedule }}">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Duration</label>
                  <input type="number" class="form-control" name="duration_minutes" value="{{ $data->duration_minutes }}">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Capacity</label>
                  <input type="number" class="form-control" name="capacity" value="{{ $data->capacity }}">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <label>Trainer</label>
                    <select class="form-control" id="trainer_id" name="trainer_id" required>
                        <option value="">Select Trainer</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}" {{ $data->trainer_id == $trainer->id ? 'selected' : '' }}>
                                {{ $trainer->trainer_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <label>Kategori Class</label>
                    <select class="form-control" name="id_kategori_class" required>
                        <option value="">Select Kategori Class</option>
                        @foreach($kategories as $kategori)
                            <option value="{{ $kategori->id }}" {{ $data->id_kategori_class == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
              <div class="col-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="summernote" name="description">{{ $data->description }}</textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="open" {{ $data->status == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="close" {{ $data->status == 'close' ? 'selected' : '' }}>Close</option>
                    </select>
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
      display: none;
  }
</style>
@endsection

@section('addJavascript')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var input = document.getElementById('image');
      var previewContainer = document.getElementById('photo-preview-container');
      var preview = document.getElementById('photo-preview');
      var removeButton = document.getElementById('remove-photo');
      var oldPhoto = "{{ $data->image ? asset('storage/' . $data->image) : '' }}";

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
          preview.src = '';
          previewContainer.style.display = 'none';
          preview.style.display = 'none';
          removeButton.style.display = 'none';
          input.value = '';
      });
  });
</script>
@endsection
