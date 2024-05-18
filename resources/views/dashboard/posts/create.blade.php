@extends('layouts.defaultAdmin')
@section('content')
<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
  <div class="py-8">

    <form method="post" action="/dashboard/posts" class="max-w-sm mx-auto" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Title</label>
            <input type="text" id="title" name="title" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 @error('title') is-invalid @enderror" required autofocus value="{{ old('title') }}">
            @error('title')
            <p id="title" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-5">
            <label for="slug" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Slug</label>
            <input type="text" id="slug" name="slug" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 @error('slug') is-invalid @enderror" required autofocus value="{{ old('slug') }}">
            @error('slug')
            <p id="title" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
            <div class="mb-5">
                <label for="Category" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Select Category</label>
                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    @foreach ($categories as $category)
                    @if(old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>

            </div>
            <div class="mb-5">
              
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image Post</label>
              <img class="img-preview object-cover mb-3 sm:w-1/3">
              <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="previewImage()">
              @error('image')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
              @enderror

            </div>
            <div class="mb-5">
                <label for="body" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">body</label>
                @error('body')
                <p id="body" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body"value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
              </div>

     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
    </form>

  </div>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');
  
  title.addEventListener('change', function() {
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });

  function previewImage() {
          const image = document.querySelector('#image');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';
          
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
          }
        }
</script>
@endsection