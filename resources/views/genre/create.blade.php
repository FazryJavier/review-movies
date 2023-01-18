@extends('layouts/master')

@section('judul')
Add New Genre
@endsection

@section('content')
<form method="POST" action="/genre">
    @csrf
    @method('POST')
        <div class="mb-3">
            <label for="name" class="form-label">Genre Name</label>
            <input type="text" name="name" class="form-control">
        </div> 
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <a href="/genre" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Add Data</button>
    </form>  
@endsection