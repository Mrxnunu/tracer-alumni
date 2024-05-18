<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('back/img/Logo_ubhara.png') }}" type="image/x-icon"/>
  <title>Ubharajaya | Admin Tracer Alumni</title>

  {{-- trix editor --}}
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script type="text/javascript" src="/js/trix.js"></script>

  @vite('resources/css/app.css')
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- hilang tombol --}}
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display:none;
    }
  </style>
</head>
<body>
    <div class="wrapper">
        @include('includes.sidebar')
        <div class="main-content">
            <div class="p-4 sm:ml-64">
				@yield('content')
			</div>
        </div>
    </div>
</body>
</html>