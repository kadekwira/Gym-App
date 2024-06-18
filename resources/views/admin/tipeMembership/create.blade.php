@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Tipe Membership</h1>
    </div>
    <div class="row">
      <div class="col-12 ">
        <div class="card">
          <form method="post" action="{{route('tipe-membership.store')}}">
            @csrf
            <div class="card-header">
              <h4>Add Tipe Membership</h4>
            </div>
            <div class="card-body row">
              <div class="col-12">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" required=""
                  name="title" placeholder="2 Bulan"
                  >
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label>Duration Member</label>
                  <input type="number" class="form-control" required=""
                  name="duration_member" placeholder="12"
                  >
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Price Member</label>
                  <input type="text" class="form-control" required="" id="price_member"
                  name="price_member">
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label>Satuan</label>
                  <input type="text" class="form-control" required=""
                  name="by" placeholder="bulan/tahun">
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
    </div>
  </section>
</div>
@endsection





@section('addJavascript')
<script>
  var input = document.getElementById('price_member');
  input.addEventListener('keyup', function(e) {
      var bilangan = e.target.value.replace(/[^,\d]/g, '').toString(),
          split = bilangan.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
  
      if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
      }
  
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      var formattedValue = 'Rp. ' + rupiah; // Menambahkan prefix "Rp." secara default
      input.value = formattedValue;
  });
  </script>
@endsection