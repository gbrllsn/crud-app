<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT2R5 Cinema Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Montserrat", sans-serif;
            min-height: 100vh;
            color: #f8ead2;
            background:
                linear-gradient(rgba(20, 10, 4, 0.80), rgba(20, 10, 4, 0.88)),
                url("{{ asset('images/jethro.jpeg') }}") center/cover no-repeat fixed;
            padding: 35px;
        }

        .dashboard-shell {
            max-width: 1380px;
            margin: 0 auto;
            background: rgba(31, 16, 8, 0.84);
            border: 1px solid rgba(255, 210, 130, 0.15);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(0,0,0,0.45);
            backdrop-filter: blur(4px);
        }

        .top-strip {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 22px 30px;
            background: linear-gradient(to right, rgba(61, 29, 11, 0.96), rgba(108, 58, 20, 0.86));
            border-bottom: 1px solid rgba(255, 213, 151, 0.15);
        }

        .brand-area {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .brand-area img {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 16px;
            border: 1px solid rgba(255, 215, 145, 0.24);
        }

        .brand-copy h2 {
            font-family: "Cinzel", serif;
            font-size: 24px;
            color: #ffd99d;
            letter-spacing: 1px;
        }

        .brand-copy p {
            font-size: 13px;
            color: #efd2a7;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: 0.82;
            margin-top: 3px;
        }

        .top-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .top-actions a,
        .logout-btn {
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 999px;
            border: 1px solid rgba(255, 211, 145, 0.18);
            background: rgba(255,255,255,0.08);
            color: #ffe4b8;
            font-size: 14px;
            font-weight: 500;
            transition: 0.25s ease;
            cursor: pointer;
            font-family: "Montserrat", sans-serif;
        }

        .top-actions a:hover,
        .logout-btn:hover {
            background: #d9a441;
            color: #2b1609;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(217, 164, 65, 0.25);
        }

        .dashboard-content {
            padding: 40px 32px 34px;
        }

        .welcome-panel {
            background:
                linear-gradient(rgba(35, 17, 8, 0.64), rgba(35, 17, 8, 0.78)),
                url("{{ asset('images/jethro.jpeg') }}") center/cover no-repeat;
            border-radius: 28px;
            border: 1px solid rgba(255, 211, 145, 0.10);
            padding: 36px 28px;
            margin-bottom: 28px;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.02);
        }

        .user-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 26px;
        }

        .profile-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .profile-left img {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 208, 135, 0.28);
        }

        .profile-info .name {
            font-size: 18px;
            font-weight: 600;
            color: #fff0d3;
        }

        .profile-info .status {
            font-size: 13px;
            color: #f0c986;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .mini-badge {
            background: rgba(255, 210, 130, 0.10);
            border: 1px solid rgba(255, 210, 130, 0.16);
            color: #ffd99d;
            padding: 10px 16px;
            border-radius: 999px;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .marquee-box {
            background: #fff7ea;
            color: #2c1709;
            border: 7px solid #98611f;
            border-radius: 20px;
            padding: 22px;
            box-shadow: 0 0 0 4px #efc474, 0 16px 35px rgba(0,0,0,0.30);
            margin-bottom: 20px;
        }

        .marquee-box h1 {
            font-family: "Cinzel", serif;
            font-size: 46px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 10px;
            letter-spacing: 1.5px;
        }

        .marquee-box p {
            text-align: center;
            color: #5b3417;
            max-width: 760px;
            margin: 0 auto;
            line-height: 1.75;
            font-size: 16px;
        }

        .section-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .panel,
        .stat-card,
        .movie-card {
            background: linear-gradient(180deg, rgba(77, 39, 16, 0.92), rgba(43, 22, 10, 0.94));
            border: 1px solid rgba(255, 208, 135, 0.10);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.20);
        }

        .panel small,
        .movie-card small,
        .stat-card small {
            color: #e4b76d;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 11px;
            display: block;
            margin-bottom: 10px;
        }

        .panel h3,
        .movie-card h3,
        .stat-card h3 {
            font-family: "Cinzel", serif;
            font-size: 24px;
            color: #fff0d2;
            margin-bottom: 10px;
        }

        .panel p,
        .movie-card p,
        .stat-card p {
            color: #efd7b2;
            line-height: 1.75;
            font-size: 14px;
        }

        .highlight-list {
            margin-top: 16px;
            display: grid;
            gap: 12px;
        }

        .highlight-item {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255, 214, 148, 0.08);
            border-radius: 16px;
            padding: 14px 16px;
        }

        .highlight-item strong {
            display: block;
            color: #ffe4b8;
            margin-bottom: 4px;
            font-size: 15px;
        }

        .highlight-item span {
            color: #e8cca2;
            font-size: 13px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .stat-number {
            font-family: "Cinzel", serif;
            font-size: 40px;
            color: #ffd38a;
            margin-bottom: 8px;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 6px;
        }

        .movie-card {
            position: relative;
            overflow: hidden;
        }

        .movie-poster {
            height: 210px;
            border-radius: 18px;
            margin-bottom: 18px;
            background:
                linear-gradient(rgba(18, 8, 3, 0.18), rgba(18, 8, 3, 0.45)),
                url("{{ asset('images/jethro.jpeg') }}") center/cover no-repeat;
            border: 1px solid rgba(255, 211, 145, 0.12);
        }

        .movie-tag {
            display: inline-block;
            margin-top: 14px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 209, 138, 0.10);
            border: 1px solid rgba(255, 209, 138, 0.16);
            color: #ffd99d;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 1100px) {
            .section-grid,
            .movie-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 18px;
            }

            .dashboard-content {
                padding: 20px;
            }

            .top-strip {
                justify-content: center;
                text-align: center;
            }

            .brand-area {
                flex-direction: column;
            }

            .user-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .marquee-box h1 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

@php
    $avatars = ['avatar.png', 'avatar1.png', 'avatar2.png'];
    $avatar = $avatars[auth()->user()->id % count($avatars)];
@endphp

<div class="dashboard-shell">

    <div class="top-strip">
        <div class="brand-area">
            <img src="{{ asset('images/jethroLogo.jpeg') }}" alt="IT2R5 Cinema Logo">

            <div class="brand-copy">
                <h2>IT2R5 CINEMA</h2>
                <p>Dashboard Panel</p>
            </div>
        </div>

        <div class="top-actions">
            <a href="{{ route('profile.edit') }}">Edit Profile</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">Log out</button>
            </form>
        </div>
    </div>

    <div class="dashboard-content">

        <div class="welcome-panel">
            <div class="user-row">
                <div class="profile-left">
                    <img src="{{ asset('images/avatars/' . $avatar) }}" alt="Avatar">

                    <div class="profile-info">
                        <div class="name">{{ auth()->user()->name }}</div>
                        <div class="status">Now Showing: Dashboard Access</div>
                    </div>
                </div>

                <div class="mini-badge">Cinema Management Space</div>
            </div>

            <div class="marquee-box">
                <h1>Welcome to IT2R5 Cinema</h1>
                <p>
                    Manage your movie listing system in a dashboard inspired by a classic theater lobby,
                    complete with warm lighting, elegant panels, and a premium cinema atmosphere.
                </p>
            </div>
        </div>

        <div class="section-grid">
            <div class="panel">
                <small>Featured Panel</small>
                <h3>Theater Overview</h3>
                <p>
                    This dashboard is redesigned to feel like the front interior of a premium cinema.
                    It gives your CRUD app a stronger visual identity while keeping the layout simple,
                    readable, and functional for daily movie management.
                </p>

                <div class="highlight-list">
                    <div class="highlight-item">
                        <strong>Marquee-Inspired Header</strong>
                        <span>A theater-style welcome area based on your cinema entrance reference.</span>
                    </div>

                    <div class="highlight-item">
                        <strong>Warm Classic Colors</strong>
                        <span>Amber, gold, brown, and dark wood-inspired tones across the full interface.</span>
                    </div>

                    <div class="highlight-item">
                        <strong>Poster-Style Sections</strong>
                        <span>Cards and content blocks designed to feel closer to real cinema displays.</span>
                    </div>
                </div>
            </div>

            <div class="panel">
                <small>System Theme</small>
                <h3>Now Playing</h3>
                <p>
                    Your first themed version is focused on a luxurious cinema lobby concept using your
                    IT2R5 Cinema branding and logo.
                </p>
                <div class="movie-tag">Theme 1 Active</div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <small>Status</small>
                <div class="stat-number">01</div>
                <h3>Theme Loaded</h3>
                <p>
                    The first custom movie listing theme is now applied to the welcome page and dashboard.
                </p>
            </div>

            <div class="stat-card">
                <small>Branding</small>
                <div class="stat-number">02</div>
                <h3>Cinema Identity</h3>
                <p>
                    Your dashboard now matches the visual language of your IT2R5 Cinema concept and logo.
                </p>
            </div>

            <div class="stat-card">
                <small>Next Step</small>
                <div class="stat-number">03</div>
                <h3>Second Theme</h3>
                <p>
                    Once this first version is approved, send the next reference theme and I’ll style it too.
                </p>
            </div>
        </div>

        <div class="movie-grid" style="margin-top: 24px;">
            <div class="movie-card">
                <small>Now Showing</small>
                <div class="movie-poster"></div>
                <h3>Luxury Cinema Layout</h3>
                <p>
                    A visually richer dashboard section inspired by movie posters and theater displays.
                </p>
                <div class="movie-tag">Premium Theme</div>
            </div>

            <div class="movie-card">
                <small>Coming Soon</small>
                <div class="movie-poster"></div>
                <h3>Second Custom Theme</h3>
                <p>
                    This space can later be redesigned once you send your second movie listing style reference.
                </p>
                <div class="movie-tag">Awaiting Theme</div>
            </div>

            <div class="movie-card">
                <small>Featured</small>
                <div class="movie-poster"></div>
                <h3>Branded CRUD Interface</h3>
                <p>
                    Your app stays functional but now feels more like a real branded system instead of a basic layout.
                </p>
                <div class="movie-tag">Cinema Styled</div>
            </div>
        </div>

    </div>
</div>

</body>
</html>