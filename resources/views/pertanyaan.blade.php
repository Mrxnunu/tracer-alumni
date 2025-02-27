@extends('layouts.default')

@section('content')

@if (session()->has('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif
<div class="mb-4 mx-auto px-4 lg:px-10">
    <h1 class="font-semibold text-xl dark:text-white">Kuisioner Tracer Alumni</h1>
</div>
@if($questionnaire)
<div class="max-h-96 overflow-y-auto mx-auto px-4 lg:px-10">
    <form action="{{ route('pertanyaan.submit', $questionnaire->id) }}" method="POST" class="w-full">
        @csrf
        <div class="mb-3">
            <label for="nama" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nama
            </label>
            <input type="text" id="nama" name="nama" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        </div>
        <div class="mb-3">
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="text" id="email" name="email" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('email')
                <div class="text-red-500 text-xs mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="npm" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                NPM
            </label>
            <input type="text" id="npm" name="npm" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('npm')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="prodi" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Prodi
            </label>
            <input type="text" id="prodi" name="prodi" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('prodi')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="tahun_lulus" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Tahun Lulus
            </label>
            <input type="text" id="tahun_lulus" name="tahun_lulus" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('tahun_lulus')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="bekerja">Apakah Anda Sudah Bekerja ?</label>
            <div class="flex items-center">
                <input id="bekerja" name="bekerja" type="radio" value="1" class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-gray-600 dark:text-gray-300">Ya, Sudah</label>
            </div>
            <div class="flex items-center">
                <input id="bekerja" name="bekerja" type="radio" value="0" class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 focus:ring-amber-500 dark:focus:ring-amber-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-gray-600 dark:text-gray-300">Belum</label>
            </div>
        </div>
        @foreach($questionnaire->questions as $question)
        <div class="mb-4">
            <label class="text-base font-medium dark:text-white">{{ $question->question_text }} <span class="text-xs text-red-500">{{ $question->option ? "* wajib diisi" : ""}}</span></label>
            @if($question->type == 'multiple_choice')
            @foreach($question->answers as $answer)
            <div>
                <label class="dark:text-white">
                    <input type="radio" class="focus:ring-amber-500 focus:border-amber-500 text-amber-600" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" {{ $question->option ? "required" : "" }}>
                    {{ $answer->answer_text }}
                </label>
            </div>
            @endforeach
            @else
            <textarea name="answers[{{ $question->id }}]" rows="2" class="w-full border border-gray-300 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:bg-gray-600 p-2 rounded-lg focus:ring-amber-500 focus:border-amber-500" {{ $question->option ? "required" : "" }}></textarea>
            @endif
        </div>
        @endforeach
        <button type="submit" class="flex-shrink-0 px-4 py-2 text-xs font-semibold text-white bg-amber-600 rounded-lg shadow-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-green-200">Submit</button>
    </form>
</div>


@else
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Tidak ada kuesioner yang aktif saat ini.</span>
</div>
@endif

@endsection
