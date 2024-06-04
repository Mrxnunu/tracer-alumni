@extends('layouts.default')

@section('content')
<h1 class="mb-6 text-center">{{ $title }}</h1>

<div class="flex justify-center mb-6">
  <div class="w-full max-w-md">
    <form action="/loker" method="GET">
      <div class="flex mb-6">
        <input type="text" class="flex-grow px-4 py-2 border border-gray-300 rounded-l-md  focus:ring-amber-500 focus:border-amber-500" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="px-4 py-2 bg-amber-500 text-white rounded-r-md" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($lokers->count())
<div class="bg-white shadow-md rounded-lg mb-6 overflow-hidden dark:bg-gray-900">
  <img src="{{ asset('storage/' . $lokers[0]->image) }}" class="w-2/3 mx-auto" alt="">
  <div class="p-6 text-center">
    <h3 class="text-2xl font-bold mb-2"><a href="/lokers/{{ $lokers[0]->slug }}" class="text-black hover:underline dark:text-white">{{ $lokers[0]->title }}</a></h3>
    <p class="text-gray-600 dark:text-white mb-4">
      <small>By. <a href="/blog?authors={{ $lokers[0]->author->username ?? 'Tidak ada author' }}" class="text-amber-500 hover:underline">{{ $lokers[0]->author->name }}</a> in {{ $lokers[0]->created_at->diffForHumans() }}</small>
    </p>
    <p class="mb-4">{{ $lokers[0]->excerpt }}</p>
    <a href="/lokers/{{ $lokers[0]->slug }}" class="inline-block px-4 py-2 bg-amber-500 text-white rounded">Read more</a>
  </div>
</div>

<div class="container mx-auto">
  <div class="flex flex-wrap -mx-3">
    @foreach ($lokers->skip(1) as $loker)
    <div class="w-full sm:w-1/2 lg:w-1/3 px-3 mb-6">
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
          <h5 class="text-xl font-bold mb-2">{{ $loker->title }}</h5>
          <p class="text-gray-600 mb-4">
            <small>By. <a href="/loker?authors={{ $loker->author->username ?? 'Tidak ada author' }}" class="text-amber-500 hover:underline">{{ $loker->author->username ?? 'Tidak ada author' }}</a> {{ $loker->created_at->diffForHumans() }}</small>
          </p>
          <p class="mb-4">{{ $loker->excerpt }}</p>
          <a href="/lokers/{{ $loker->slug }}" class="inline-block px-4 py-2 bg-amber-500 text-white rounded">Read more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@else
  <p class="text-center text-2xl">Maaf Belum Ada Loker</p>
@endif

<div class="flex justify-center">
  {{ $lokers->links() }}
</div>
@endsection
