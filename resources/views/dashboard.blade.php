<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatre Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: "Poppins", sans-serif;
            background:
                linear-gradient(rgba(70,0,20,0.85), rgba(30,0,10,0.9)),
                url("{{ asset('images/maui.jpeg') }}") center/cover no-repeat fixed;
            color: #f5e7ea;
            padding: 40px;
        }

        .wrapper {
            max-width: 1200px;
            margin: auto;
            background: rgba(60,0,20,0.8);
            border-radius: 30px;
            padding: 40px;
        }

        /* TOP BAR */
        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo img {
            width: 80px;
        }

        /* PROFILE */
        .profile-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #c94f6d;
            box-shadow: 0 0 10px rgba(255,100,140,0.4);
        }

        .info .name {
            font-size: 14px;
            font-weight: 500;
        }

        .info .status {
            font-size: 12px;
            color: #e8cbd2;
        }

        /* LOGOUT */
        .logout-btn {
            background: #c94f6d;
            padding: 10px 20px;
            border-radius: 999px;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #ff6a8a;
        }

        /* TITLE */
        h1 {
            text-align: center;
            font-family: "Playfair Display", serif;
            font-size: 46px;
            margin-bottom: 20px;
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 20px;
        }

        .card {
            background: rgba(255,255,255,0.05);
            padding: 25px;
            border-radius: 20px;
        }

        .card h3 {
            font-family: "Playfair Display", serif;
            margin-bottom: 10px;
        }

        @media (max-width: 900px){
            .grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

@php
    $avatars = ['avatar.png', 'avatar1.png', 'avatar2.png'];
    $avatar = $avatars[auth()->user()->id % count($avatars)];
@endphp

<div class="wrapper">

    <!-- TOP BAR -->
    <div class="top">

        <!-- LOGO -->
        <div class="logo">
            <img src="{{ asset('images/mauiLogo.jpeg') }}">
        </div>

        <!-- PROFILE + LOGOUT -->
        <div class="profile-area">

            <div class="profile">
                <img src="{{ asset('images/avatars/' . $avatar) }}" class="avatar">

                <div class="info">
                    <div class="name">{{ auth()->user()->name }}</div>
                    <div class="status">On Stage</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>

        </div>

    </div>

    <!-- TITLE -->
    <h1>Welcome, {{ auth()->user()->name }}</h1>

    <!-- CONTENT -->
    <div class="grid">

        <div class="card">
            <h3>Stage Overview</h3>
            <p>Manage your system in a theatrical environment.</p>
        </div>

        <div class="card">
            <h3>Performances</h3>
            <p>View and manage movie listings.</p>
        </div>

        <div class="card">
            <h3>Settings</h3>
            <p>Customize your profile and system.</p>
        </div>

    </div>

</div>

</body>
</html>