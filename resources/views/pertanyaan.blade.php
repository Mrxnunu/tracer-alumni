@extends('layouts.default')

@section('content')

@if (session()->has('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

@if($questionnaire)
<form action="{{ route('pertanyaan.submit', $questionnaire->id) }}" method="POST">
    @csrf
    
    <div class="mb-5">
        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nama
        </label>
        <input type="text" id="nama" name="nama" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Email
        </label>
        <input type="text" id="email" name="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('email')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-5">
        <label for="npm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            NPM
        </label>
        <input type="text" id="npm" name="npm" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('npm')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>
    
    @foreach($questionnaire->questions as $question)
    <div class="mb-4">
        <h4 class="text-lg font-semibold">{{ $question->question_text }}</h4>
        @if($question->type == 'multiple_choice')
        @foreach($question->answers as $answer)
        <div>
            <label>
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                {{ $answer->answer_text }}
            </label>
        </div>
        @endforeach
        @else
        <textarea name="answers[{{ $question->id }}]" rows="4" class="w-full border border-gray-300 p-2 rounded-lg"></textarea>
        @endif
    </div>
    @endforeach
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Submit</button>
</form>
@else
<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">Tidak ada kuesioner yang aktif saat ini.</span>
</div>
@endif

@endsection
