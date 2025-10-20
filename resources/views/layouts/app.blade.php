<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Desa Bantengputih')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#4CAF50",
                        secondary: "#2c5530",
                        accent: "#45a049",
                    },
                    fontFamily: {
                        poppins: ["Poppins", "sans-serif"],
                    },
                },
            },
        };
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/ui-styles.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="font-poppins bg-gray-50">
    <!-- Navigation -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <script src="{{ asset('js/ui/utils.js') }}"></script>
    <script src="{{ asset('js/ui/navigation.js') }}"></script>
    <script src="{{ asset('js/ui/slider.js') }}"></script>
    <script src="{{ asset('js/ui/animations.js') }}"></script>
    <script src="{{ asset('js/ui/components.js') }}"></script>
    <script src="{{ asset('js/ui-scripts.js') }}"></script>

    @stack('scripts')
</body>

</html>
