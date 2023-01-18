@extends('layouts/master')

@section('judul')
Detail Cast
@endsection

@section('content')
    <h1>Data dari {{$castShow->name}} <br></h1>
    <h4>Name : {{$castShow->name}}</h4>
    <h4>Age : {{$castShow->age}}</h4>
    <h4>Bio : {{$castShow->bio}}</h4>
    <a href="/cast" type="button" class="btn btn-secondary">Back</a>
@endsection