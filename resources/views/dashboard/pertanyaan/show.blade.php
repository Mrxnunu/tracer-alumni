@extends('layouts.defaultAdmin')

@section('content')
@if (session()->has('success'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif
<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="text-2xl leading-tight">{{ $questionnaire->title }}</h2>
        </div>
        <div class="mt-4">
            <p>{{ $questionnaire->description }}</p>
        </div>
        <div class="mt-8">
            <h3 class="text-xl leading-tight mb-4">pertayaan</h3>
            @foreach($questionnaire->questions as $question)
                <div class="mb-4">
                    <h4 class="text-lg font-semibold">{{ $question->question_text }}</h4>
                    @if($question->type == 'multiple_choice')
                        <ul class="list-disc pl-5">
                            @foreach($question->answers as $answer)
                                <li>{{ $answer->answer_text }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Essay question</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
