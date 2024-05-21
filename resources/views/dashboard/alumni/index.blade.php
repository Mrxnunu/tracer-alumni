@extends('layouts.defaultAdmin')
@section('content')
  <div class="container mx-auto px-4 sm:px-8 max-w-3x">
    <div class="py-8">
        {{-- @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">{{ session('success') }}
              </div>
            @endif --}}
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            
            
            <h2 class="text-2xl leading-tight">Master Alumni</h2>
            {{-- <div class="text-end flex space-x-3">
                <a href="/dashboard/posts/create" class="btn block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">tambah</a>
            </div> --}}
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table id="example" class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                #
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama Alumni
                            </th>
                            {{-- <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Category
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($namaAlumni  as $a)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $loop->iteration }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $a->answer_text  }}</p>
                            </td>
                            {{-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $a->parameter  }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-dark text-sm">
                                <button type="button" class="inline-block text-gray-500 hover:text-gray-700">
                                    Edit
                                </button>
                                <button type="button" class="inline-block text-gray-500 hover:text-gray-700 ml-4">
                                    Delete
                                </button>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection