@extends('layouts.main')

@section('content')

<div class="container my-5 k_show px-5 py-4">
  <h3 class="mb-4" > Titolo: {{ $comic->title}}</h3>
  <h4>Cover:</h4>
  <img src="{{$comic->image}}" alt="cover image">
  <h3 class="mt-4">Categoria: {{$comic->type}} </h3>
</div>
  
@endsection


