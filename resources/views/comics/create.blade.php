@extends('layouts.main')

@section('content')
<div class="container my-5">
  <h3>Inserisci una nuova Comic</h3>
  <form action="{{ route('comics.store')}}" method="POST">
    @csrf
    <div class="form-group my-3">
      <label for="name" class="my-2" >Nome Comic</label>
      <input type="text" class="form-control" name="name" placeholder="Nome Comic">
      
    </div>
    <div class="form-group my-3">
      <label for="type" class="my-2">Tipo Comic</label>
      <input type="text" name="type" class="form-control" placeholder="Tipo Comic">
    </div>

    <div class="form-group my-3">
      <label for="image" class="my-2">URL immagine</label>
      <input type="text" name="image" class="form-control" placeholder="URL immagine">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection