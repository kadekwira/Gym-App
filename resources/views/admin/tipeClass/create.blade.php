@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kategori Class</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{ route('tipe-class.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header">
              <h4>Add Data Kategori Class</h4>
            </div>
            <div class="card-body row">
              <div class="col-12">
                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control" name="type_image" id="type_image" required>
                    <option value="img">Image</option>
                    <option value="icon">Icon</option>
                  </select>
                </div>
              </div>
              <div class="col-12" id="imageInput" style="display:none;">
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="image" accept="image/*">
                </div>
              </div>
              <div class="col-12" id="iconInput" style="display:none;">
                <div class="form-group">
                  <label>Icon</label>
                  <input type="text" class="form-control" name="image" placeholder=' example : <i class="fas fa-dumbbell"></i>'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" class="form-control" required name="nama_kategori">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="summernote" name="description"></textarea>
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

@endsection

@section('addJavascript')
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const typeImageSelect = document.getElementById('type_image');
    const imageInput = document.getElementById('imageInput');
    const iconInput = document.getElementById('iconInput');

    function toggleInputFields() {
      const selectedType = typeImageSelect.value;
      if (selectedType === 'img') {
        imageInput.style.display = 'block';
        iconInput.style.display = 'none';
      } else if (selectedType === 'icon') {
        imageInput.style.display = 'none';
        iconInput.style.display = 'block';
      }
    }

    typeImageSelect.addEventListener('change', toggleInputFields);
    toggleInputFields(); 
  });
</script>
@endsection
