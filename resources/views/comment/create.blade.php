@extends('layouts/master')

@section('judul')
Add Comment
@endsection

@section('content')
<form method="POST" action="/comment">
    @csrf
    @method('POST')
        <div class="mb-3">
            <label for="description" class="form-label"><h4>Give some Comment :</h4></label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>

        <div>
            <label for="point" class="form-label"><h4>Give me your Rating :</h4></label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="point">
            <option selected>Give rate to this movie</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
        </div>

        <a href="/movie" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>  
@endsection