@extends('layouts.defaultAdmin')
@section('content')
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
                <a href="/dashboard/loker" class="ms-1 text-sm font-medium text-amber-600 md:ms-2 dark:text-amber-600">Alumni</a>
            </div>
            </li>
        </ol>
    </nav>
    <div class="py-5">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full items-center">
            <h2 class="text-xl md:text-2xl leading-tight font-medium dark:text-white">Master Alumni</h2>
            <p class="text-red-600 text-xs">Data Ini Merupakan alumni yang sudah mengisi Kuisioner</p>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden p-4 bg-white">
                <table id="example" class="stripe pt-4 pb-2" style="width:100%">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                No
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Nama Alumni
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Npm
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Prodi
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Tahun Lulus
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-400 bg-gray-100 dark:bg-slate-900 text-left text-xs font-semibold text-gray-600 dark:text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="dark:bg-slate-900">
                        @foreach ($dataAlumni as $a)
                        <tr>
                            <td class="px-5 py-5 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $loop->iteration }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $a->nama }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $a->email }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $a->npm }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $a->prodi }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <p class="text-gray-900 dark:text-gray-300 whitespace-no-wrap">{{ $a->tahun_lulus }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm">
                                <a href="{{ url('/dashboard/alumni/'.$a->npm) }}" class="flex-shrink-0 px-4 py-2 font-medium hover:text-amber-600">
                                    Detail
                                </a>
                            </td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
