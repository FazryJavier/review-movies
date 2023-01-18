@extends('layouts/master')

@section('judul')
Detail Genre
@endsection

@section('content')
    <h1>Film list by Genre<br></h1>
    <h4>Genre : {{$genreShow->name}}</h4>
    <a href="/genre" type="button" class="btn btn-secondary">Back</a>
@endsection