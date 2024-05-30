@extends('layouts.default')

@section('content')
<h1 class="mb-6 text-center">{{ $title }}</h1>

<div class="flex justify-center mb-6">
  <div class="w-full max-w-md">
    <form action="/artikel" method="GET">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif
      <div class="flex mb-6">
        <input type="text" class="flex-grow px-4 py-2 border-gray-300 focus:ring-amber-500 focus:border-amber-500  rounded-l-md" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="px-4 py-2 bg-amber-500 text-white rounded-r-md" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
<div class="bg-white shadow-md rounded-lg mb-6 dark:bg-slate-900">
  <img src="{{ asset('storage/' . $posts[0]->image) }}" class="w-2/3 mx-auto" alt="{{ $posts[0]->category->name }}">
  <div class="p-6 text-center">
    <h3 class="text-2xl font-bold mb-2"><a href="/posts/{{ $posts[0]->slug }}" class="text-black hover:underline dark:text-white">{{ $posts[0]->title }}</a></h3>
    <p class="text-gray-600 mb-4">
      <small>By. <a href="/artikel?authors={{ $posts[0]->author->username ?? 'Tidak ada author' }}" class="text-amber-500 hover:underline">{{ $posts[0]->author->name }}</a> in <a href="/artikel?category={{ $posts[0]->category->slug }}" class="text-amber-500 hover:underline">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small>
    </p>
    <p class="mb-4">{{ $posts[0]->excerpt }}</p>
    <a href="/posts/{{ $posts[0]->slug }}" class="inline-block px-4 py-2 bg-amber-500 text-white rounded">Read more</a>
  </div>
</div>

<div class="container mx-auto">
  <div class="flex flex-wrap -mx-3">
    @foreach ($posts->skip(1) as $post)
    <div class="w-full sm:w-1/2 lg:w-1/3 px-3 mb-6">
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="absolute bg-black bg-opacity-70 text-white px-3 py-2"><a href="/artikel?category={{ $post->category->slug }}" class="hover:underline">{{ $post->category->name }}</a></div>
        
          <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="w-full" alt="{{ $post->category->name }}">
        
        <div class="p-6">
          <h5 class="text-xl font-bold mb-2">{{ $post->title }}</h5>
          <p class="text-gray-600 mb-4">
            <small>By. <a href="/artikel?authors={{ $post->author->username ?? 'Tidak ada author' }}" class="text-amber-500 hover:underline">{{ $post->author->username ?? 'Tidak ada author' }}</a> {{ $post->created_at->diffForHumans() }}</small>
          </p>
          <p class="mb-4">{{ $post->excerpt }}</p>
          <a href="/posts/{{ $post->slug }}" class="inline-block px-4 py-2 bg-amber-500 text-white rounded">Read more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@else
  <p class="text-center text-2xl">Not post found</p>
@endif

<div class="flex justify-center">
  {{ $posts->links() }}
</div>
@endsection
