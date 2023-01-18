@extends('layouts/master')

@section('judul')
Edit Data Genre
@endsection

@section('content')
<form method="POST" action="{{url('/genre/'.$genreEdit->id)}}">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Genre Name</label>
            <input type="text" value="{{$genreEdit->name}}" name="name" class="form-control">
        </div> 
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <a href="/genre" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary  ml-3">Update Genre</button>
    </form>  
@endsection