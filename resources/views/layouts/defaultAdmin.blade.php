<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('back/img/Logo_ubhara.png') }}" type="image/x-icon"/>
  <title>Ubharajaya | Admin Tracer Alumni</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.tailwindcss.css">
  {{-- trix editor --}}
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script type="text/javascript" src="/js/trix.js"></script>
  {{-- hilang tombol --}}
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display:none;
    }
  </style>
</head>
<body class="font-montserrat">
    <div class="wrapper">
        @include('includes.sidebar')
        <div class="main-content">
            <div class="p-4 sm:ml-64">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.tailwindcss.com/3.4.3"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.tailwindcss.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
      $(document).ready(function() {
          $('#example').DataTable();
      });
    </script>
</body>
</html>
