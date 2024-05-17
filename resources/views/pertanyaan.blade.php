@extends('layouts.default')
@section('content')

<form class="max-w-sm mx-auto" method="POST" action="#">
  @csrf
    @foreach ($parameters as $p)
        <div class="mb-5">
            <label for="parameter-{{ $p->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                {{ $p->parameter }} (Topik: {{ $p->topik->topik }}, Periode: {{ $p->periode->nama_periode }})
            </label>
            <input type="text" id="parameter-{{ $p->id }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
    @endforeach
    <button type="submit" class="text-blue-500">Kirim</button>

</form>

@endsection
