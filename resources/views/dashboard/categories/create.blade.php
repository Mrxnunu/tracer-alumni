@extends('layouts.defaultAdmin')
@section('content')
<div class="px-4 sm:px-8">
  <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-600 dark:text-gray-400 dark:hover:text-white">
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
                <a href="/dashboard/categories" class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-amber-600 hover:text-amber-600">Kategori Artikel</a>
            </div>
            </li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/dashboard/categories/create" class="ms-1 text-sm font-medium text-amber-600 md:ms-2 dark:text-amber-600">Create Kategori Artikel</a>
            </div>
            </li>
        </ol>
  </nav>
  <div class="py-5">
    <form method="post" action="/dashboard/categories" class="w-full" enctype="multipart/form-data">
        @csrf
        <h2 class="text-2xl leading-tight font-medium mb-2 dark:text-white">Buat Kategori Artikel</h2>
        <div class="mb-5">
          <label for="name" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Nama Kategori</label>
          <input type="text" id="name" name="name" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 @error('name') is-invalid @enderror" required autofocus value="{{ old('name') }}">
          @error('name')
          <p id="name" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
          @enderror
        </div>
          {{-- <label for="slug" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">slug</label>
          <input type="text" id="slug" name="slug" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 @error('slug') is-invalid @enderror" required autofocus value="{{ old('slug') }}">
          @error('slug')
          <p id="slug" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
          @enderror --}}
        </div>

     <button type="submit" class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Simpan</button>
    </form>

  </div>
</div>


@endsection