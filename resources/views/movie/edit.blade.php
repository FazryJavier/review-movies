@extends('layouts/master')

@section('judul')
Edit Data Movie
@endsection

@section('content')
<form method="POST" action="{{url('/movie/'.$movieEdit->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="{{$movieEdit->title}}" name="title" class="form-control">
        </div> 
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" value="{{$movieEdit->year}}" name="year" class="form-control">
        </div> 
        @error('year')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description"  class="form-control" rows="5">{{$movieEdit->description}}</textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="poster" class="form-label">Upload Poster</label>
            @if($movieEdit -> poster)
                <img src="{{asset('storage/' . $movieEdit->poster)}}" alt="" class="img-preview img-fluid mb-3 d-block">
            @else
                <img class="img-preview img-fluid">
            @endif
            <input type="file" class="form-control" id="poster" name="poster" onchange="previewImage()">
        </div>
        @error('poster')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <a href="/movie" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary  ml-3">Update Data</button>
    </form>  

    <script>
        function previewImage() {
            const image = document.querySelector('#poster');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection