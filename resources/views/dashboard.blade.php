<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zen Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

                /* LOGO CENTER */
        .logo-center {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-center img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            opacity: 0.9;
        }

        body {
            font-family: "DM Sans", sans-serif;
            background: #2a2e27;
            color: #d4d8cc;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        /* ✅ WIDER DASHBOARD */
        .card {
            width: 100%;
            max-width: 1300px;
            background: #323630;
            border-radius: 28px;
            padding: 70px 70px;
        }

        /* TOP BAR */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 60px;
            flex-wrap: wrap;
        }

        /* PROFILE LEFT */
        .profile-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .profile-left img {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info .name {
            font-size: 16px;
            color: #dce4d4;
        }

        .profile-info .status {
            font-size: 13px;
            color: #7d8878;
        }

        /* ACTIONS RIGHT */
        .top-actions {
            display: flex;
            gap: 12px;
        }

        .top-actions a,
        .logout-btn {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 999px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .top-actions a {
            background: rgba(255,255,255,0.05);
            color: #9eaa96;
        }

        .top-actions a:hover {
            background: rgba(255,255,255,0.1);
            color: #c8d4c0;
        }

        .logout-btn {
            background: #6a4b4b;
            color: #f0d8d8;
        }

        .logout-btn:hover {
            background: #7a5858;
        }

        /* MAIN TEXT */
        h1 {
            font-family: "Lora", serif;
            font-size: 56px;
            text-align: center;
            margin-bottom: 20px;
            color: #dce4d4;
        }

        h1 em {
            color: #8faa88;
            font-style: italic;
        }

        .main-text {
            text-align: center;
            max-width: 720px;
            margin: 0 auto 60px;
            color: #7d8878;
            line-height: 1.8;
        }

        /* CARDS */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .info-card {
            background: rgba(255,255,255,0.04);
            padding: 28px;
            border-radius: 20px;
        }

        .info-card small {
            color: #6b7d66;
            font-size: 12px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
        }

        .info-card h3 {
            font-family: "Lora", serif;
            font-size: 26px;
            margin-bottom: 10px;
            color: #dce4d4;
        }

        .info-card p {
            color: #7d8878;
            line-height: 1.7;
        }

        /* MOBILE */
        @media (max-width: 768px) {
            .card {
                padding: 40px 25px;
            }

            h1 {
                font-size: 36px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .top-bar {
                flex-direction: column;
                gap: 20px;
            }

            .top-actions {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

@php
    // ✅ FIXED avatar list (matches your actual files)
    $avatars = ['avatar.png', 'avatar1.png', 'avatar2.png'];

    $avatar = $avatars[auth()->user()->id % count($avatars)];
@endphp

<div class="card">

    <!-- TOP BAR -->
    <div class="top-bar">

        <!-- LEFT: PROFILE -->
        <div class="profile-left">
            <img src="{{ asset('images/avatars/' . $avatar) }}" alt="Avatar">

            <div class="profile-info">
                <div class="name">{{ auth()->user()->name }}</div>
                <div class="status">Logged in</div>
            </div>
        </div>

        <!-- RIGHT: ACTIONS -->
        <div class="top-actions">
            <a href="{{ route('profile.edit') }}">Edit Profile</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">Log out</button>
            </form>
        </div>

    </div>

    <!-- MAIN TEXT -->
    <!-- LOGO -->
    <div class="logo-center">
        <img src="{{ asset('images/sqimg_1776694944841.png') }}" alt="Logo">
    </div>

        <h1>
        Welcome back.<br>
        <em>Work deeply.</em>
    </h1>

    <p class="main-text">
        This is your personal dashboard where you can manage your space,
        stay organized, and continue your work in a calm and focused environment.
    </p>

    <!-- CARDS -->
    <div class="info-grid">

        <div class="info-card">
            <small>Profile</small>
            <h3>Your Space</h3>
            <p>
                Personalize your account and keep your workspace calm, simple, and organized.
            </p>
        </div>

        <div class="info-card">
            <small>Avatar</small>
            <h3>Dynamic Identity</h3>
            <p>
                Each user automatically receives a unique avatar based on available images.
            </p>
        </div>

    </div>

</div>

</body>
</html>