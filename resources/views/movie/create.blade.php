@extends('layouts/master')

@section('judul')
Add Data Movie
@endsection

@section('content')
<form method="POST" action="/movie" enctype="multipart/form-data">
    @csrf
    @method('POST')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div> 
        @error('title')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" name="year" class="form-control">
        </div> 
        @error('year')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5"></textarea>
        </div>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="poster" class="form-label">Upload Poster</label>
            <img class="img-preview img-fluid mb-3">
            <input type="file" class="form-control" id="poster" name="poster" onchange="previewImage()">
        </div>
        @error('poster')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" placeholder="Pisahkan dengan koma dan huruf besar diawal kata, contoh : Adventure,Comedy,Action">
        </div> 
        @error('genre')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <a href="/movie" type="button" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-primary">Add Data</button>
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