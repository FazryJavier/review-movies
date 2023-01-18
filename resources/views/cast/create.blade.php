@extends('layouts/master')

@section('judul')
Add Data Cast
@endsection

@section('content')
<form method="POST" action="/cast">
    @csrf
    @method('POST')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div> 
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" name="age" class="form-control">
        </div> 
        @error('age')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3"></textarea>
        </div>
        @error('bio')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <a href="/cast" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Add Data</button>
    </form>  
@endsection