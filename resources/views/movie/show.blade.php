@extends('layouts/master')

@section('judul')
Detail Movie
@endsection

@section('content')
    <h1>Review {{$movieShow->title}} <br></h1>
    <h4>Year : {{$movieShow->year}}</h4>
    <h4>Description : {{$movieShow->description}}</h4><br>
    <h4>Poster : </h4>
    <img src="{{asset('storage/' . $movieShow->poster)}}" alt="Image" class="img-fluid mt-3"><br><br>
    <br><br>
    <a href="/movie" type="button" class="btn btn-secondary">Back</a>
    <a href="/comment/create" type="button" class="btn btn-primary">Give a Comment</a>
@endsection