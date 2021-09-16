@extends('layouts.app')

@section('content')
@if ( $errors->any() )
    @foreach ($errors->all() as $error)
    
    <div class="alert alert-danger"> {{ $error }} </div>
    
    @endforeach
@endif
    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" >
            @csrf
            @method('PATCH')
            <div class="mb-3">

              <label for="titolo" class="form-label">Modifica titolo</label>
              <input type="text" name="title" class="form-control
              @error('title')
                  is-invalid
              @enderror" id="titolo" value=" {{old('title', $post->title) }}" aria-describedby="emailHelp">
              
            </div>

            <div class="mb-3">
              <p>{{ $post->category->name }}</p>
              <label for="cat" class="form-label">Categoria</label>
              <select name="category_id" id="cat">
                <option value="">-- Seleziona una categoria --</option>
               @foreach ($categories as $category)
                  <option value="{{ $category->id }}"
                    @if($category->id == old('category_id', $post->category_id)) selected @endif>
                    {{$category->name}}
                  </option>
               @endforeach
              </select>
              
            </div>

            <div class="mb-3">
              <label for="content" class="form-label">Modifica contenuto</label>
              <textarea name="content" id="content" class="form-control
              @error('content')
                  is-invalid
              @enderror" cols="30" rows="10">{{old('content', $post->content) }}</textarea>
              
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection