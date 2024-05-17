@extends('layouts.default')
@section('content')
<div class="flex flex-wrap justify-center gap-4">
    @foreach ($posts as $post)
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p>{{ $post->excerpt }}</p>
                <div class="card-actions justify-end">
                    <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection