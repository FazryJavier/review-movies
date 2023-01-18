@extends('layouts/master')

@section('judul')
Edit Data Cast
@endsection

@section('content')
<form method="POST" action="{{url('/cast/'.$castEdit->id)}}">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{$castEdit->name}}" name="name" class="form-control">
        </div> 
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" value="{{$castEdit->age}}" name="age" class="form-control">
        </div> 
        @error('age')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio"  class="form-control" rows="3">{{$castEdit->bio}}</textarea>
        </div>
        @error('bio')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <a href="/cast" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary  ml-3">Update Data</button>
    </form>  
@endsection