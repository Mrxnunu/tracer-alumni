
@extends('layouts.default')
@section('content')

@if (session()->has('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session('success') }}
  </div>
@endif

<form class="max-w-sm mx-auto" method="POST" action="{{ route('form.store') }}">
  @csrf
        <div class="mb-5">
            <label for="npm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                npm
            </label>
            <input type="text" id="npm" name="npm" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('npm') is-invalid @enderror" required value="{{ old('npm') }}">
            @error('npm')
            <p id="npm" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nama
            </label>
            <input type="text" id="nama" name="nama" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nama') is-invalid @enderror">
            @error('nama')
            <p id="nama" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                email
            </label>
            <input type="text" id="email" name="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror" required value="{{ old('email') }}">
            @error('email')
            <p id="email" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                no_hp
            </label>
            <input type="number" id="no_hp" name="no_hp" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('no_hp') is-invalid @enderror" required value="{{ old('no_hp') }}">
            @error('no_hp')
            <p id="no_hp" class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                pekerjaan
            </label>
            <input type="text" id="pekerjaan" name="pekerjaan" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('pekerjaan') }}">
        </div>
        <div class="mb-5">
            <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                nama_perusahaan
            </label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('nama_perusahaan') }}">
        </div>
        <div class="mb-5">
            <label for="alamat_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                alamat_perusahaan
            </label>
            <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ old('alamat_perusahaan') }}">
        </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kirim</button>

</form>

@endsection