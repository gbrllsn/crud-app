<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen</title>
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
            max-width: 900px;
            background: #323630;
            border-radius: 28px;
            padding: 60px 50px;
            text-align: center;
            position: relative;
        }

        /* CHANGED: logo + auth buttons now share one top row */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        /* CHANGED: logo moved to top-left */
        .logo img {
            width: 64px;
            height: auto;
            display: block;
        }

        .top-nav {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .top-nav a,
        .logout-btn {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 400;
            transition: 0.2s ease;
            border: none;
            cursor: pointer;
            font-family: "DM Sans", sans-serif;
        }

        .top-nav a {
            color: #9eaa96;
            background: rgba(255, 255, 255, 0.05);
        }

        .top-nav a:hover {
            background: rgba(255, 255, 255, 0.09);
            color: #c8d4c0;
        }

        .logout-btn {
            background: #6a4b4b;
            color: #f0d8d8;
        }

        .logout-btn:hover {
            background: #7a5858;
            color: #fff0f0;
        }

        h1 {
            font-family: "Lora", serif;
            font-size: 48px;
            font-weight: 400;
            margin-bottom: 18px;
            color: #dce4d4;
            line-height: 1.25;
            letter-spacing: -0.01em;
        }

        h1 em {
            font-style: italic;
            color: #8faa88;
        }

        p {
            font-size: 16px;
            color: #7d8878;
            max-width: 460px;
            margin: 0 auto 38px;
            line-height: 1.75;
            font-weight: 300;
        }

        .hero-image {
            width: 100%;
            max-width: 380px;
            margin: 0 auto 38px;
            border-radius: 18px;
            overflow: hidden;
            background: #2a2e27;
        }

        .hero-image img {
            width: 100%;
            display: block;
            opacity: 0.88;
        }

        @media (max-width: 768px) {
            .card {
                padding: 35px 25px;
            }

            h1 {
                font-size: 34px;
            }

            p {
                font-size: 15px;
            }

            .top-bar {
                flex-direction: column;
                align-items: center;
                margin-bottom: 35px;
            }

            .top-nav {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="card">

        <div class="top-bar">
            <div class="logo">
                <img src="{{ asset('images/sqimg_1776694944841.png') }}" alt="Logo">
            </div>

            <div class="top-nav">
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>

        <h1>Think clearly.<br><em>Work deeply.</em></h1>

        <p>
            A calm space to focus, track your energy, and do your best thinking — without the noise.
        </p>

        <div class="hero-image">
            <img src="{{ asset('images/welcome.png') }}" alt="Welcome Image">
        </div>

    </div>
</body>
</html>