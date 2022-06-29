@extends('layouts.main')

@section('content')

  <table class="k_table container">
    <thead>
      <tr>
        <th class="k_head">Title</th>
        <th class="k_head">Type</th>
        <th class="k_head">Actions</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($comics as $comic)
        <tr>
            <td> {{$comic->title}}</td>
            <td> {{$comic->type}}</td>
            <td>
                <a href="#" class="btn btn-primary k_button">SHOW</a>
                <a href="# " class="btn btn-warning k_button">EDIT</a>
                {{-- per poter passare l'evento del delete devo usare un form, contenente solo il tasto --}}

            </td>
          </tr>
        @endforeach
      
    </tbody>
  </table>

@endsection

@section('title', 'comic')