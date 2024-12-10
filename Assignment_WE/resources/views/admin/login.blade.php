<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <a href="{{ url('/') }}"> 
            <img src="{{ asset('images/svgs/camera.svg') }}" alt="Logo" style="filter: invert(1);">
        </a>
        <h1>Admin Login</h1>

        @if ($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>


        <footer>
            &copy; 2024 Bryant Rothmoore Studios
        </footer>
    </div>
</body>

</html>