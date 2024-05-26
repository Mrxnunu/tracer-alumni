@extends('layouts.default')
@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
  <h1 class="text-4xl font-bold mb-4">{{ $loker->title }}</h1>
  
  <div class="flex items-center mb-4">
      <div class="text-sm">
          <p class="text-gray-900 leading-none">{{ $loker->author->name }}</p>
          <p class="text-gray-600">{{ $loker->created_at->format('M d, Y') }}</p>
      </div>
  </div>

  @if($loker->image)
  <div class="mb-6">
      <img class="w-full rounded" src="{{ asset('storage/' . $loker->image) }}" alt="{{ $loker->title }}">
      @else 
      <img src="https://source.unsplash.com/1200x400?cars" class="card-img-top" alt="cars">
  </div>
  @endif

  <div class="prose prose-lg">
      {!! $loker->body !!}
  </div>

  <div class="mt-6">
      <a href="/loker" class="text-blue-500 hover:underline">Back to Blog</a>
  </div>
</div>
@endsection