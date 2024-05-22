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
                <a href="/dashboard/pertanyaan" class="ms-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Kuisioner</a>
            </div>
            </li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/dashboard/pertanyaan" class="ms-1 text-sm font-medium text-amber-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detail Kuisioner</a>
            </div>
            </li>
        </ol>
    </nav>
    <div class="py-5">
        <h2 class="text-2xl leading-tight font-medium mb-4">Detail Kuisioner</h2>
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="text-xl leading-tight font-medium">{{ $questionnaire->description }}</h2>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table id="example" class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Pertanyaan
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Tipe Pertanyaan
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Jawaban
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questionnaire->questions as $question)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $question->question_text }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($question->type == 'multiple_choice')
                                        <p>Pilihan Ganda</p>
                                    @else
                                        <p>Essay</p>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if($question->type == 'multiple_choice')
                                        <ul class="list-disc">
                                        @foreach($question->answers as $answer)
                                            <li>{{ $answer->answer_text }}</li>
                                        @endforeach
                                        </ul>
                                        @else
                                            <p>Essay</p>
                                        @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
        {{-- <h2 class="text-2xl leading-tight font-medium mb-2">Detail Kuisioner</h2>
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="text-xl leading-tight font-medium">Judul : {{ $questionnaire->title }}</h2>
        </div>
        <div class="mb-4">
            <p>{{ $questionnaire->description }}</p>
        </div>
        <div class="">
            <h3 class="text-xl leading-tight">Pertanyaan</h3>
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
        </div> --}}
    </div>
</div>
@endsection
