@extends('layouts.app')
@section('title')
Index
@endsection
@section('content')
<!-- /resources/views/post/create.blade.php -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
    </div>
    <select name="postCreator" class="form-select" aria-label="Default select example">
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>
@endsection
