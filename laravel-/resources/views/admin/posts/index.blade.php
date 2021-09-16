@extends('layouts.app')

@section('content')
@if (session('updated'))
<div class="alert alert-success">
    
        {{session('updated')}}
    
</div>
@endif
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Codice post</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
                
            
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>
              @if($post->category)
              {{ $post->category->name }}
              @endif
            </td>
            <td>
                <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-primary">Visualizza</a>
                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary">Modifica</a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" class="d-inline-block delete-post-form" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class=" btn btn-danger" value="Cancella">
                </form>
            </td>
          </tr>

        @endforeach
        </tbody>
      </table>

      <h2>Post per categorie</h2>
      @foreach ($categories as $category)
          <strong>{{ $category->name }}</strong>
          @forelse ($category->posts as $post)
              <p><a href="{{route('admin.posts.show', $post->slug)}}">{{ $post->title }}</a></p>
          @empty
              <p>Ancora nessun post per questa categoria, <a href="{{route('admin.posts.create', $post->slug)}}">aggiungine uno</a></p>
          @endforelse
      @endforeach

</div>
    
@endsection