@extends('layouts.app')

@section('title') edit Page @endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="Post" action="{{route('posts.update',['post'=> $post['id']])}}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title"  placeholder="{{$post->title}}">

    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="description" placeholder="{{$post->description}}"></textarea>

    </div>
    <div class="form-group">
        <label for="post_creator">Post Creator</label>
        <select name="user_id" class="form-control" id="post_creator">
          @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
      {{-- <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="post-slug">
    </div> --}}
    <button type="submit" class="btn btn-primary">update Post</button>
  </form>

@endsection
