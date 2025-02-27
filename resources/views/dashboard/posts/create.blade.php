@extends('layouts.defaultAdmin')
@section('content')
<div class="px-4 sm:px-8">
  <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-600 dark:text-gray-400 dark:hover:text-amber-600">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Dashboard
            </a>
            </li>
            <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/dashboard/posts" class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-amber-600 hover:text-amber-600">Artikel</a>
            </div>
            </li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/dashboard/pertanyaan/create" class="ms-1 text-sm font-medium text-amber-600 md:ms-2 dark:text-amber-600">Create Artikel</a>
            </div>
            </li>
        </ol>
  </nav>
  <div class="py-5">
    <form method="post" action="/dashboard/posts" class="w-full" enctype="multipart/form-data">
        @csrf
        <h2 class="text-2xl leading-tight font-medium mb-2 dark:text-white">Buat Artikel</h2>
        <div class="mb-5 text-gray-700">
            <label for="title" class="block mb-2 text-sm font-medium  dark:text-gray-500">Title</label>
            <input type="text" id="title" name="title" class="bg-gray-50 border border-grey-500 text-gray-900 dark:text-gray-100 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 @error('title') is-invalid @enderror" required autofocus value="{{ old('title') }}">
            @error('title')
            <p id="title" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>
            <div class="mb-5 text-gray-700">
                <label for="Category" class="block mb-2 text-sm font-medium dark:text-gray-500">Pilih Kategori</label>
                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-500 dark:focus:border-amber-500">

                    @foreach ($categories as $category)
                    @if(old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>

            </div>
            <div class="mb-5  text-gray-700">
              <label class="block mb-2 text-sm font-medium dark:text-gray-500" for="image">Posting Image</label>
              <img class="img-preview object-cover sm:w-1/3">
              <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="previewImage()">
              @error('image')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
              @enderror

            </div>
            <div class="mb-5 text-gray-700">
                <label for="body" class="block mb-2 text-sm font-medium dark:text-gray-500">Isi Artikel</label>
                @error('body')
                <p id="body" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <input id="body"type="hidden" name="body"value="{{ old('body') }}">
                <trix-editor input="body" class="dark:text-gray-200"></trix-editor>
              </div>

     <button type="submit" class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Simpan</button>
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