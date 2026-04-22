<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: #2a2e27;
            color: #d4d8cc;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .card {
            width: 100%;
            max-width: 520px;
            background: #323630;
            border-radius: 28px;
            padding: 50px 40px;
            text-align: center;
        }

        .logo {
            margin-bottom: 18px;
        }

        .logo img {
            width: 56px;
            height: auto;
        }

        h1 {
            font-family: "Lora", serif;
            font-size: 42px;
            font-weight: 400;
            margin-bottom: 12px;
            color: #dce4d4;
            line-height: 1.2;
        }

        h1 em {
            font-style: italic;
            color: #8faa88;
        }

        .subtitle {
            font-size: 15px;
            color: #7d8878;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .field {
            text-align: left;
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-size: 14px;
            color: #c8d4c0;
            margin-bottom: 8px;
        }

        .field input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 16px;
            border: none;
            outline: none;
            background: rgba(255,255,255,0.05);
            color: #dce4d4;
            font-size: 14px;
        }

        .field input::placeholder {
            color: #8a9485;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0 22px;
            font-size: 14px;
            color: #9eaa96;
            justify-content: flex-start;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .btn {
            width: 100%;
            padding: 14px 18px;
            border-radius: 999px;
            border: none;
            font-size: 14px;
            font-family: "DM Sans", sans-serif;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-primary {
            background: #4e6b4a;
            color: #d4e0d0;
        }

        .btn-primary:hover {
            background: #5a7a56;
        }

        .links {
            margin-top: 28px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 24px;
            row-gap: 12px;
            flex-wrap: wrap;
        }

        .links a {
            color: #9eaa96;
            text-decoration: none;
            font-size: 14px;
            white-space: nowrap;
        }

        .links a:hover {
            color: #c8d4c0;
        }

        .error {
            color: #f0b4b4;
            font-size: 13px;
            margin-top: 6px;
            text-align: left;
        }

        .status {
            margin-bottom: 18px;
            color: #c8d4c0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <img src="{{ asset('images/sqimg_1776694944841.png') }}" alt="Logo">
        </div>

        <h1>Log in.<br><em>Enter your space.</em></h1>
        <p class="subtitle">Welcome back. Continue your work in a calm and focused space.</p>

        <x-auth-session-status class="status" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>

           <div class="links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif

                <a href="{{ route('register') }}">Create account</a>
                <a href="{{ url('/') }}">Back to Welcome</a>
            </div>
        </form>
    </div>
</body>
</html>