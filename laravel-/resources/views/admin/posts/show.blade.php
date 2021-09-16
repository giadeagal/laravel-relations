@extends('layouts.app')

@section('title', "Mostra post")

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{$post->slug}}
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text">{{$post->content}}</p>
              <a href="{{route('admin.posts.index')}}" class="btn btn-primary">Torna indietro</a>
            </div>
          </div>
    </div>
@endsection