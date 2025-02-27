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
                    <a href="/dashboard/alumni" class="ms-1 text-sm font-medium text-gray-700 hover:text-amber-600 dark:text-gray-400 dark:hover:text-amber-600">Alumni</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="ms-1 text-sm font-medium text-amber-600 md:ms-2">Detail</span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="py-5">
        <h2 class="text-2xl leading-tight font-medium">Detail Alumni</h2>
        <h1 class="font-medium">Tema : {{ $questionnaireTitle }}</h1>
        <div class="mt-4">
            <h1 class="font-medium">{{ $alumni->nama }} ({{ $alumni->npm }})</h1>
        </div>
        <div class="mt-4">
            <table class="min-w-full mt-2 bg-white">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">Pertanyaan</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">Tipe</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">Jawaban</th>
                    </tr>
                </thead>
                <tbody class="dark:bg-slate-900">
                    @foreach ($jawabanWithQuestions as $jawaban)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">{{ $jawaban['question_text'] }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">{{ $jawaban['type'] == 'multiple_choice' ? 'Multiple Choice' : 'Essay' }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">{{ $jawaban['answer_text'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection