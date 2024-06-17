@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Class</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{route('data-class.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Add Data Class</h4>
            </div>
            <div class="card-body row">
              <div class="col-12">
                <div class="form-group">
                  <div id="photo-preview-container" style="display: none;">
                    <img id="photo-preview" src="#" alt="your image" style="display: none;" />
                    <button type="button" id="remove-photo" class="btn btn-sm btn-danger" style="display: none;"><i class="fas fa-xmark"></i></button>
                </div>
                  <label>Foto</label>
                  <input type="file" class="form-control" name="image" accept="image/*">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Class Name</label>
                  <input type="text" class="form-control" required=""
                  name="class_name"
                  >
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Schedule</label>
                  <input type="datetime-local" class="form-control" name="schedule">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Duration</label>
                  <input type="number" class="form-control" name="duration_minutes">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Capacity</label>
                  <input type="number" class="form-control" name="capacity">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Trainer </label>
                  <select class="form-control" id="trainer_id" name="trainer_id" required>
                    <option value="">Select Trainer</option>
                    @foreach($trainers as $data)
                        <option value="{{ $data->id }}">{{ $data->trainer_name }}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Kategori Class </label>
                  <select class="form-control" name="id_kategori_class" required>
                    <option value="">Select Kategori Class</option>
                    @foreach($kategories as $data)
                        <option value="{{ $data->id }}">
                          {{ $data->nama_kategori }}
                        </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="summernote" name="description"></textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" id="status" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">InActive</option>
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
      var input = document.querySelector('input[name="image"]');
      var previewContainer = document.getElementById('photo-preview-container');
      var preview = document.getElementById('photo-preview');
      var removeButton = document.getElementById('remove-photo');

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
          preview.src = '#';
          preview.style.display = 'none';
          removeButton.style.display = 'none';
          previewContainer.style.display = 'none';
          input.value = '';
      });
  });
</script>
@endsection