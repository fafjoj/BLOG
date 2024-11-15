
@extends('layouts.app')
@section('title')
Edit
@endsection
@section('content')
<form method="post" action="{{ route('posts.update',$post->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input value="{{ $post->title }}" name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
    </div>
    <select name="postCreator" class="form-select" aria-label="Default select example">
        @foreach ($users as $user)
            <option @selected($user->id == $post->user_id) value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>
@endsection


