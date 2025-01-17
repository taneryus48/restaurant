<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
<div class="header">
<img src="{{ asset('images/Lokmalade.svg') }}" alt="Logo" class="w-48 sm:w-64 md:w-80 lg:w-96 h-auto mx-auto">
</div>
    <!-- Google Translate Element (Sadece oturum kapalıysa) -->
    @guest
    <div id="google_translate_element"></div>
    @endguest

    <!-- Hamburger (Yalnızca oturum açmış kullanıcılar için) -->
    @auth
    <div class="d-lg-none position-fixed top-0 start-0 m-3" style="z-index:1000;">
        <div class="hamburger" onclick="toggleSidebar()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    @endauth

    <!-- Sidebar: yalnızca oturum açmış kullanıcılar için -->
    @auth
        @include('layouts.sidebar')
    @endauth

    <!-- Ana İçerik -->
    <div id="main-content">
        @yield('content')
    </div>
</div>

<!-- Google Translate Scriptleri -->
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'tr',            // Varsayılan Dil
            includedLanguages: 'tr,en,de,fr,it,es', // Açılır menüde yer alacak diller
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>
<script
    type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<!-- Bootstrap JS -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
</script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const hamburger = document.querySelector('.hamburger');
        if (sidebar && hamburger) {
            sidebar.classList.toggle('active');
            hamburger.classList.toggle('active');
        }
    }
</script>
</body>
</html>
