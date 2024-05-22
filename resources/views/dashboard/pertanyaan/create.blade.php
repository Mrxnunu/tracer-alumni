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
                <a href="/dashboard/pertanyaan" class="ms-1 text-sm font-medium text-gray-700 md:ms-2 dark:text-gray-400 dark:hover:text-white hover:text-amber-600">Kuisioner</a>
            </div>
            </li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="/dashboard/pertanyaan/create" class="ms-1 text-sm font-medium text-amber-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create Kuisioner</a>
            </div>
            </li>
        </ol>
    </nav>
  <div class="py-5">
    <form method="post" action="/dashboard/pertanyaan" class="w-11/12 m-auto" enctype="multipart/form-data">
        @csrf
        <h2 class="text-2xl leading-tight font-medium mb-2">Buat Kuisioner</h2>
        <div class="mb-5">
            <label for="title" class="font-medium text-sm">Title</label>
            <input type="text" name="title" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2 dark:bg-gray-700 dark:border-grey-500" required>
        </div>
        <div class="mb-5">
            <label for="description" class="font-medium text-sm">Description</label>
            <textarea name="description" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2 dark:bg-gray-700 dark:border-grey-500"></textarea>
        </div>
        <div class="mb-5">
            <label for="questions" class="block mb-2 text-sm font-medium">Pertanyaan</label>
            <div id="questions"></div>
            <button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none" onclick="addQuestion()">Tambah Pertanyaan</button>
        </div>
        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Simpan</button>
    </form>
  </div>
</div>

<script>
    function addQuestion() {
        const questionCount = document.querySelectorAll('.question').length;
        const questionHTML = `
            <div class="question mb-5">
                <label for="question_type_${questionCount}" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Tipe Pertanyaan</label>
                <select id="question_type_${questionCount}" name="questions[${questionCount}][type]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500" onchange="showQuestionForm(${questionCount})" required>
                    <option value="" selected disabled>Pilih Tipe Pertanyaan</option>
                    <option value="multiple_choice">Pilihan Ganda</option>
                    <option value="essay">Essay</option>
                </select>
                <div id="question_form_${questionCount}" style="display: none;">
                    <input type="text"  placeholder="Masukan Pertanyaan"  name="questions[${questionCount}][question_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 mt-2" required>
                    <div class="answers mt-2">
                        <div class="flex">
                            <input type="text" name="questions[${questionCount}][answers][0][answer_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500" placeholder="Opsi Jawaban"> 
                            <button type="button" onclick="addAnswer(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                 <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>`;
        document.getElementById('questions').insertAdjacentHTML('beforeend', questionHTML);
    }
    function addAnswer(button) {
        const answersDiv = button.closest('.answers');
        const answerCount = answersDiv.querySelectorAll('input').length;
        const questionDiv = button.closest('.question');
        const questionIndex = Array.from(questionDiv.parentNode.children).indexOf(questionDiv);
        const answerHTML = `<div class="flex"><input type="text" name="questions[${questionIndex}][answers][${answerCount}][answer_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 mt-2" placeholder="Opsi Jawaban Lain" required><button type="button" onclick="addAnswer(this)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" /></svg></button></div>`;
        answersDiv.insertAdjacentHTML('beforeend', answerHTML);
    }

    function showQuestionForm(index) {
        const questionType = document.getElementById(`question_type_${index}`).value;
        const questionForm = document.getElementById(`question_form_${index}`);
        const answersDiv = questionForm.querySelector('.answers');
        if (questionType === 'essay') {
            answersDiv.style.display = 'none';
        } else {
            answersDiv.style.display = 'block';
        }
        questionForm.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const selectElements = document.querySelectorAll('select[name$="[type]"]');
        selectElements.forEach((selectElement, index) => showQuestionForm(index));
    });
</script>

@endsection
