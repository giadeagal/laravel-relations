@extends('layouts.app')

@section('title', 'Scrivi un nuovo post')

@section('content')

@if ( $errors->any() )
    @foreach ($errors->all() as $error)
    
    <div class="alert alert-danger"> {{ $error }} </div>
    
    @endforeach
@endif
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="post" >
            @csrf
            <div class="mb-3">
              <label for="titolo" class="form-label">Titolo</label>
              <input type="text" name="title" class="form-control
              @error('title')
                  is-invalid
              @enderror" 
              id="titolo" aria-describedby="emailHelp" value="{{ old('title') }}">
              
            </div>

            <div class="mb-3">
              <label for="cat" class="form-label">Categoria</label>
              <select name="category_id" id="cat">
                <option value="">-- Selezione una categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                      @if ($category->id== old('category_id'))
                          selected
                      @endif>
                      {{$category->name}}
                    </option>
                @endforeach
              </select>
              
            </div>

            <div class="mb-3">
              <label for="content" class="form-label">Contenuto</label>
              <textarea name="content" id="content" class="form-control 
              @error('content')
              is-invalid
          @enderror" cols="30" rows="10">{{old('content')}}</textarea>
              
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection