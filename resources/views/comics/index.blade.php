@extends('layouts.main')

@section('content')

  <table class="k_table container">

    @if(session('deleted_product'))
    <div class="alert alert-warning" role="alert">
      {{ session('deleted_product')}}
    @endif

    
    
    </div>
    <thead>
      <tr>
        <th class="k_head">ID</th>
        <th class="k_head">Title</th>
        <th class="k_head">Type</th>
        <th class="k_head">Actions</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($comics as $comic)
        <tr>
            <td> {{$comic->id}}</td>
            <td> {{$comic->title}}</td>
            <td> {{$comic->type}}</td>
            <td>
                <a href="{{ route( 'comics.show', $comic->id ) }}" class="btn btn-primary k_button">SHOW</a>
                <a href="{{ route( 'comics.edit', $comic->id ) }}" class="btn btn-warning k_button">EDIT</a>

                <form class="d-inline" 
                onsubmit="return confirm('Sicuro di cancellare {{ $comic->title}}?')"
                action="{{ route('comics.destroy', $comic)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger k_button">DELETE</button>

                </form>
              
            </td>
          </tr>
        @endforeach
      
    </tbody>
  </table>

@endsection

@section('title', 'comic')