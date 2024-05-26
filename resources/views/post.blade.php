@extends('layouts.default')
@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
  <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
  
  <div class="flex items-center mb-4">
      <div class="text-sm">
          <p class="text-gray-900 leading-none">{{ $post->author->name }}</p>
          <p class="text-gray-600">{{ $post->created_at->format('M d, Y') }}</p>
      </div>
  </div>

  @if($post->image)
  <div class="mb-6">
      <img class="w-full rounded" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
      @else 
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
  </div>
  @endif

  <div class="prose prose-lg">
      {!! $post->body !!}
  </div>

  <div class="mt-6">
      <a href="/artikel" class="text-blue-500 hover:underline">Back to Blog</a>
  </div>
</div>
@endsection