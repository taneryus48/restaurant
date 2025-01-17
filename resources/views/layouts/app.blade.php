<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tatlı D') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" defer></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Google Translate -->
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    { 
                        pageLanguage: 'tr', 
                        includedLanguages: 'tr,en,fr,de,es,it', 
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE 
                    },
                    'google_translate_element'
                );
            }
        </script>
        <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <!-- CSS for Google Translate -->
    </head>
    <body class="font-sans antialiased">
        
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 d-flex">
            @auth
                <!-- Sidebar yalnızca giriş yapmış kullanıcılar için -->
                @include('layouts.sidebar')
            @endauth

            <!-- Main Content -->
            <div class="flex-1 p-4">
                <!-- Google Translate Widget -->
                <div id="google_translate_element"></div>

                <!-- Sayfa İçeriği -->
                @yield('content')
            </div>
        </div>
    </body>
</html>
