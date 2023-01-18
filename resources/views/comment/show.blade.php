@extends('layouts/master')

@section('judul')
Comment
@endsection

@section('content')
    <h4>Description : {{$commentShow->description}}</h4>
    <h4>Point : {{$commentShow->point}}</h4>
    <a href="/comment" type="button" class="btn btn-secondary">Back</a>
@endsection