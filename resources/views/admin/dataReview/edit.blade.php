@extends('layouts.layoutAdmin')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Review Gym</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('updateReview', $reviewgym->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-header">
                            <h4>Update Review Gym</h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>ID User</label>
                                    <select name="user_id" class="custom-select">
                                        <option selected>{{$reviewgym->user_id}}</option>
                                        @foreach ($user as $data)
                                            <option value="{{$data->id}}">{{$data->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Rating</label>
                                    <input type="text" class="form-control" name="rating" value="{{$reviewgym->rating}}"
                                        id="ratingInput" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea name="comment" class="summernote">{{$reviewgym->comment}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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

    ratingInput.addEventListener('input', function () {
        let rating = parseInt(ratingInput.value);

        if (isNan(rating) || rating < 1 || > 5) {
            ratingInput.value = '';
        }
    });
</script>
@endsection