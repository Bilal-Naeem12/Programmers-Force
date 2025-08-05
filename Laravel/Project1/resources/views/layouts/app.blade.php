<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Dashboard')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
  @include('components.navbar')
  <div class="flex">
    @include('components.sidebar')
    <main class="p-4 w-full">
      @yield('content')
    </main>
  </div>
</body>
</html>
