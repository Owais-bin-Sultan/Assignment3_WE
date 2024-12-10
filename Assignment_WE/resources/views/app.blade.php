<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
    @yield('styles')
    <script src="{{ asset('js/header_footer.js') }}" defer></script>
</head>

<body>
    <header id="header">
        <div class="logo">
            <a href="{{ url('admin/login') }}">
                <img src="../images/svgs/camera.svg" alt="Camera Logo">
            </a>
            <div class="logo-text">
                Bryant Rothmoore Studios
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('about') }}">About</a></li>
                <li><a href="{{ url('servicesUser') }}">Services</a></li>
                <li><a href="{{ url('bookSession') }}" class="cta">Book a Session</a></li>
                <li>
                    <div class="toggle" id="theme-button">
                        <input type="checkbox" id="theme-toggle">
                        <label for="theme-toggle"></label>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Bryant Rothmoore Photography. All Rights Reserved.</p>
        <ul>
            <li><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
    </footer>
    @yield('scripts')
</body>

</html>