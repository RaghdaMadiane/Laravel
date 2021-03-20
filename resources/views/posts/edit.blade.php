@extends('layouts.app')

@section('title') edit Page @endsection

@section('content')
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp">

    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description">laravel is awsome framework</textarea>

    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select class="form-control" id="post_creator">
          <option>Ahmed</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">update Post</button>
  </form>

@endsection
