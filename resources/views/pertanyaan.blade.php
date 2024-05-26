@extends('layouts.default')

@section('content')

@if (session()->has('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif
<div class="mb-4 mx-auto px-4 lg:px-10">
    <h1 class="font-semibold text-xl">Kuisioner Tracer Alumni</h1>
</div>
@if($questionnaire)
<div class="grid md:flex justify-between mx-auto px-4 lg:px-10">
    <form action="{{ route('pertanyaan.submit', $questionnaire->id) }}" method="POST" class="w-11/12 mx-auto">
        @csrf
        <div class="mb-3">
            <label for="nama" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nama
            </label>
            <input type="text" id="nama" name="nama" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500">
        </div>
        <div class="mb-3">
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="text" id="email" name="email" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:border-gray-600">
            @error('email')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-5">
            <label for="npm" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                NPM
            </label>
            <input type="text" id="npm" name="npm" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-amber-500 focus:border-amber-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('npm')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        
        @foreach($questionnaire->questions as $question)
        <div class="mb-4">
            <h4 class="text-base font-medium">{{ $question->question_text }}</h4>
            @if($question->type == 'multiple_choice')
            @foreach($question->answers as $answer)
            <div>
                <label>
                    <input type="radio" class="focus:ring-amber-500 focus:border-amber-500 text-amber-600" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                    {{ $answer->answer_text }}
                </label>
            </div>
            @endforeach
            @else
            <textarea name="answers[{{ $question->id }}]" rows="4" class="w-full border border-gray-300 p-2 rounded-lg focus:ring-amber-500 focus:border-amber-500"></textarea>
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
