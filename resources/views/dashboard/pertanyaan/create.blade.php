@extends('layouts.defaultAdmin')
@section('content')
<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
  <div class="py-8">

    <form method="post" action="/dashboard/pertanyaan" class="max-w-sm mx-auto" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="title">Title</label>
            <input type="text" name="title" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500" required>
        </div>
        <div class="mb-5">
            <label for="description">Description</label>
            <textarea name="description" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500"></textarea>
        </div>
        <div class="mb-5">
            <label for="questions" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Pertanyaan</label>
            <div id="questions"></div>
            <button type="button" class="btn btn-primary" onclick="addQuestion()">Tambah Pertanyaan</button>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
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
                    <input type="text" name="questions[${questionCount}][question_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 mt-2" required>
                    <div class="answers mt-2">
                        <input type="text" name="questions[${questionCount}][answers][0][answer_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500" placeholder="Answer Option">
                    </div>
                    <button type="button" onclick="addAnswer(this)">Tambah Kolom Jawaban</button>
                </div>
            </div>`;
        document.getElementById('questions').insertAdjacentHTML('beforeend', questionHTML);
    }
    
    function addAnswer(button) {
        const questionDiv = button.parentElement;
        const answerCount = questionDiv.querySelectorAll('.answers input').length;
        const questionIndex = button.parentElement.id.split('_')[2];
        const answerHTML = `<input type="text" name="questions[${questionIndex}][answers][${answerCount}][answer_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 mt-2" placeholder="Answer Option">`;
        questionDiv.querySelector('.answers').insertAdjacentHTML('beforeend', answerHTML);
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
