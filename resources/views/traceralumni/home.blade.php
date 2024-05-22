@extends('layouts.default')
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-10">
        <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-20 mb-8 md:flex justify-between items-center">
        <div>
            <h1 class="text-gray-900 dark:text-white text-2xl md:text-3xl font-extrabold mb-2">Tracer Alumni Universitas Bhayangkara Jakarta Raya</h1>
            <p class="text-md font-normal text-gray-500 dark:text-gray-400 mb-6">Selamat Datang di Laman Tracer Alumni Universitas Bhayangkara Jakarta Raya</p>
            <a href="/pertanyaan" class="inline-flex justify-center items-center py-2.5 px-5 text-base font-medium text-center text-white rounded-lg bg-amber-600 hover:bg-amber-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Isi Kuisioner
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>    
        <div>
            <img src="/back/img/dashboardAlumni.png" alt="" width="250">
        </div>
        </div>
    </div>
</section>
@endsection