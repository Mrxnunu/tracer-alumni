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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form method="post" action="/dashboard/pertanyaan" class="w-11/12 m-auto" enctype="multipart/form-data">
        @csrf
        <h2 class="text-2xl leading-tight font-medium mb-2">Buat Kuisioner</h2>
        <div class="mb-5">
            <label for="title" class="font-medium text-sm">Tema</label>
            <input type="text" name="title" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2 dark:bg-gray-700 dark:border-grey-500" required>
        </div>
        <div class="mb-5">
            <label for="description" class="font-medium text-sm">Deskripsi</label>
            <textarea name="description" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2 dark:bg-gray-700 dark:border-grey-500"></textarea>
        </div>
        <div class="mb-5">
            <label for="questions" class="block mb-2 text-sm font-medium text-red-600">Klik tombol Tambah Pertayaan untuk membuat pertanyaan</label>
            <div id="questions"></div>
            <button type="button" class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none" onclick="addQuestion()">Tambah Pertanyaan</button>
        </div>
        <button type="submit" class="text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 focus:outline-none">Simpan</button>
    </form>
  </div>
</div>

<script>
    function addQuestion() {
        const questionCount = document.querySelectorAll('.question').length;
        const questionHTML = `
            <div class="question mb-5">
                <div class="flex justify-between items-center">
                    <label for="question_type_${questionCount}" class="block mb-2 text-sm font-medium text-grey-700 dark:text-grey-500">Tipe Pertanyaan</label>
                    <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none" onclick="removeQuestion(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>

                    </button>
                </div>
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

    function removeQuestion(button) {
        button.closest('.question').remove();
    }

    function addAnswer(button) {
        const answersDiv = button.closest('.answers');
        const answerCount = answersDiv.querySelectorAll('input').length;
        const questionDiv = button.closest('.question');
        const questionIndex = Array.from(questionDiv.parentNode.children).indexOf(questionDiv);
        const answerHTML = `
            <div class="flex items-center">
                <input type="text" name="questions[${questionIndex}][answers][${answerCount}][answer_text]" class="bg-grey-50 border border-grey-500 text-grey-900 dark:text-grey-400 placeholder-grey-700 dark:placeholder-grey-500 text-sm rounded-lg focus:ring-grey-500 focus:border-grey-500 block w-full p-2.5 dark:bg-gray-700 dark:border-grey-500 mt-2" placeholder="Opsi Jawaban Lain" required>
                <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none" onclick="removeAnswer(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>`;
        answersDiv.insertAdjacentHTML('beforeend', answerHTML);
    }

    function removeAnswer(button) {
        button.closest('.flex').remove();
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


    // validasi wajib tombol tambah
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        const description = document.querySelector('textarea[name="description"]').value.trim();
        const questions = document.querySelectorAll('.question');

        if (!description) {
            alert('Deskripsi harus diisi.');
            event.preventDefault(); // Mencegah form disubmit
            return;
        }

        if (questions.length === 0) {
            alert('Anda harus menambahkan setidaknya satu pertanyaan.');
            event.preventDefault(); // Mencegah form disubmit
            return;
        }

        // Validasi pertanyaan dan jawaban jika ada
        let valid = true;
        questions.forEach((question, index) => {
            const questionText = question.querySelector(`input[name="questions[${index}][question_text]"]`).value.trim();
            const questionType = question.querySelector(`select[name="questions[${index}][type]"]`).value;

            if (!questionText) {
                valid = false;
                alert(`Pertanyaan ${index + 1} harus diisi.`);
                event.preventDefault();
                return;
            }

            if (questionType === 'multiple_choice') {
                const answers = question.querySelectorAll(`input[name^="questions[${index}][answers]"]`);
                answers.forEach((answer, answerIndex) => {
                    if (!answer.value.trim()) {
                        valid = false;
                        alert(`Jawaban ${answerIndex + 1} pada pertanyaan ${index + 1} harus diisi.`);
                        event.preventDefault();
                        return;
                    }
                });
            }
        });

        if (!valid) {
                    event.preventDefault();
                }
            });
        });

</script>

@endsection
