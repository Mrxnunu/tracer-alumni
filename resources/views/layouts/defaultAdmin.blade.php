<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('back/img/Logo_ubhara.png') }}" type="image/x-icon"/>
  <title>Ubharajaya | Admin Tracer Alumni</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  @vite(['resources/css/app.css','resources/js/app.js'])
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
</body>
</html>