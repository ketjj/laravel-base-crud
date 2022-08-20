@extends('layouts.main')

@section('content')


<div class="container my-5 k_show px-5 py-4">
  <h3 class="mb-4" > Titolo: {{ $comic->title}}</h3>
  <h4>Cover:</h4>
  <img src="{{$comic->image}}" alt="cover image">
  <h3 class="my-4">Categoria: {{$comic->type}} </h3>
  <a href="{{ route( 'comics.index') }}" class="btn btn-primary k_button"> >>Torna indietro</a>
  <a href="{{ route( 'comics.edit', $comic ) }}" class="btn btn-danger k_button">Edit</a>
</div>

@endsection

@section('title', 'More Info')


