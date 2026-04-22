<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            max-width: 560px;
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
            font-size: 40px;
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

        .btn {
            width: 100%;
            padding: 14px 18px;
            border-radius: 999px;
            border: none;
            font-size: 14px;
            font-family: "DM Sans", sans-serif;
            cursor: pointer;
            transition: 0.2s ease;
            background: #4e6b4a;
            color: #d4e0d0;
            margin-top: 8px;
        }

        .btn:hover {
            background: #5a7a56;
        }

        .links {
            margin-top: 28px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
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
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">
            <img src="{{ asset('images/sqimg_1776694944841.png') }}" alt="Logo">
        </div>

        <h1>Create account.<br><em>Begin calmly.</em></h1>
        <p class="subtitle">Make your account and start using your space with a clean and simple setup.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn">Register</button>

            <div class="links">
                <a href="{{ route('login') }}">Already have an account?</a>
                <a href="{{ url('/') }}">Back to Welcome</a>
            </div>
        </form>
    </div>
</body>
</html>