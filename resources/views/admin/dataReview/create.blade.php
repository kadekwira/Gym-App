@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Review</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('saveReview')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Add Data Review</h4>    
                        </div>
                        <div class="card-body row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>ID User</label>
                                    <select name="user_id" class="custom-select">
                                        @foreach ($user as $data)
                                            <option value="{{$data->id}}">{{$data->id}}</option>
                                        @endforeach
                                        <option selected>ID User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <input type="text" class="form-control" name="rating" placeholder="1-5" id="ratingInput" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea name="comment" class="summernote"></textarea>
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

@section('addJavascript')
<script>
    const ratingInput = document.getElementById('ratingInput');

    ratingInput.addEventListener('input', function() {
        let rating = parseInt(ratingInput.value);

        if (isNan(rating)  || rating < 1  || > 5) {
            ratingInput.value = '';
        }
    });
</script>
@endsection