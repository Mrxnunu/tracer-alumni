<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ asset('back/img/Logo_ubhara.png') }}" type="image/x-icon"/>
  @vite('resources/css/app.css')
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="wrapper">
        @include('includes.navbar')
        <div class="main-content p-4">
            <div class="content">
				@yield('content')
			</div>
        </div>
    </div>
</body>
</html>