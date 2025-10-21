<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <title>{{ $title }}</title>

    <!-- VITE TAILWIND CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FONT INTER VAR -->
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- FONT INSTRUMENTS SANS -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> --}}

    <!-- ICON BOOTSTRAP -->
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"
    />
  </head>

  <body>
    <div class="bg-sky-100">
      <!-- HEADER -->
      @include('frontend.template.header')

      <!-- CONTENT-FRONTEND -->
      @yield('content-frontend')

      <!-- FOOTER -->
      @include('frontend.template.footer')
    </div>
  </body>
</html>

