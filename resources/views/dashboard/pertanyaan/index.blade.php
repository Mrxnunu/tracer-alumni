@extends('layouts.defaultAdmin')

@section('content')
@if (session()->has('success'))
<div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="text-sm ms-2">{{ session('success') }}</span>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@endif

<div class="px-4 sm:px-8">
    <!-- Breadcrumb -->
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
                <a href="/dashboard/pertanyaan" class="ms-1 text-sm font-medium text-amber-600 md:ms-2 dark:text-amber-600">Kuisioner</a>
            </div>
            </li>
        </ol>
    </nav>
    <div class="py-5">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full items-center">
            <h2 class="text-2xl leading-tight font-medium dark:text-white">Master Kuisioner</h2>
            <div class="text-end flex">
                <a href="/dashboard/pertanyaan/create" class="flex-shrink-0 px-4 py-2 text-xs font-semibold text-white bg-amber-600 rounded-lg shadow-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-green-200">
                    Tambah Kuisioner
                </a>
            </div>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table id="example" class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Tema
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Deskripsi
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Keterangan
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Responden
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Detail
                            </th>
                        </tr>
                    </thead>
                    <tbody class="dark:bg-slate-900">
                        @foreach ($questionnaires as $q)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $q->title }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $q->description }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">
                                <form action="{{ route('pertanyaan.toggleActive', $q->id) }}" method="POST" id="toggle-active-form-{{ $q->id }}">
                                    @csrf
                                    @method('PATCH')
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" onChange="toggleActive({{ $q->id }})" {{ $q->active ? 'checked' : '' }}>
                                        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:bg-green-600"></div>
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $q->active ? 'Active' : 'Inactive' }}</span>
                                    </label>
                                </form>                                
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">
                                <a href="/dashboard/pertanyaan/showResponden/{{ $q->id }}"><p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $q->responden }}</p></a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-400 text-sm">
                                <a href="/dashboard/pertanyaan/{{ $q->id }}" class="flex-shrink-0 px-4 py-2 font-medium text-white bg-green-500 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-green-200">
                                    Pratinjau
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleActive(id) {
        document.getElementById('toggle-active-form-' + id).submit();
    }
</script>

@endsection
