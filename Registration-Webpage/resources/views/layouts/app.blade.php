<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <!-- Include CSS files or other common resources -->
</head>
<body>
    <!-- Include the header -->
    @include('partials.header')

    <!-- Content section -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Include the footer -->
    @include('partials.footer')

    <!-- Include scripts or other common resources -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>
</html>
