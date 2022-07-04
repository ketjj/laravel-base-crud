@extends('layouts.main')

@section('content')

{{-- @dump($errors->all()) --}}

{{-- @if($errors->any())
<div class="container my-5 alert alert-danger">

  @foreach ($errors->all() as $err)
    <div>{{ $err}}</div>
  @endforeach
  
</div>
@endif --}}

<div class="container my-5">
  <h3>Inserisci una nuova Comic</h3>
  <form action="{{ route('comics.store')}}" method="POST">
    @csrf
    <div class="form-group my-3">
      <label for="title" class="my-2" >Nome Comic</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Nome Comic">
      @error('title')
       <div class="custom_error">{{ $message}}</div>
      @enderror
    </div>

    <div class="form-group my-3">
      <label for="type" class="my-2">Tipo Comic</label>
      <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="Tipo Comic">
      @error('type')
      <div class="custom_error">{{ $message}}</div>
     @enderror
    </div>

    <div class="form-group my-3">
      <label for="image" class="my-2">URL immagine</label>
      <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="URL immagine">
      @error('image')
      <div class="custom_error">{{ $message}}</div>
     @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection