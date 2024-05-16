<h1>ini posts</h1><br>
@foreach ($posts as $post)
    <h2>{{$post->title}}</h2>
    <h3>{{ $post->category->name }}</h3>
    <h3>{{ $post->author->name }}</h3>
    <p>{{$post->slug}}</p>
    <p>{{ $post->body }}</p>
@endforeach