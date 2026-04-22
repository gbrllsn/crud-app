<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT2R5 Cinema</title>
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
                linear-gradient(rgba(21, 10, 4, 0.70), rgba(21, 10, 4, 0.82)),
                url("{{ asset('images/jethro.jpeg') }}") center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .page-overlay {
            width: 100%;
            max-width: 1250px;
            background: rgba(35, 18, 9, 0.72);
            border: 1px solid rgba(255, 210, 130, 0.18);
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.45),
                inset 0 0 0 1px rgba(255, 221, 170, 0.04);
            border-radius: 28px;
            overflow: hidden;
            backdrop-filter: blur(4px);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 24px 30px;
            background: linear-gradient(to right, rgba(57, 28, 11, 0.95), rgba(90, 47, 19, 0.85));
            border-bottom: 1px solid rgba(255, 209, 138, 0.18);
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 14px;
            border: 1px solid rgba(255, 214, 153, 0.25);
            background: rgba(255,255,255,0.05);
        }

        .brand-text h2 {
            font-family: "Cinzel", serif;
            font-size: 22px;
            font-weight: 700;
            color: #ffdca2;
            letter-spacing: 1px;
        }

        .brand-text span {
            font-size: 13px;
            color: #e7c99a;
            opacity: 0.8;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .top-nav {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .top-nav a,
        .logout-btn {
            text-decoration: none;
            padding: 11px 20px;
            border-radius: 999px;
            border: 1px solid rgba(255, 211, 145, 0.18);
            background: rgba(255, 248, 236, 0.08);
            color: #ffe6bb;
            font-size: 14px;
            font-weight: 500;
            transition: 0.25s ease;
            cursor: pointer;
            font-family: "Montserrat", sans-serif;
        }

        .top-nav a:hover,
        .logout-btn:hover {
            background: #d9a441;
            color: #2b1609;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(217, 164, 65, 0.25);
        }

        .hero {
            padding: 55px 40px 60px;
            text-align: center;
        }

        .hero-logo {
            margin-bottom: 22px;
        }

        .hero-logo img {
            width: 130px;
            max-width: 100%;
            object-fit: contain;
            filter: drop-shadow(0 8px 20px rgba(0,0,0,0.35));
        }

        .marquee {
            background: #fff6e8;
            color: #2f1809;
            border: 8px solid #9b641f;
            border-radius: 20px;
            padding: 24px 20px;
            max-width: 850px;
            margin: 0 auto 30px;
            box-shadow:
                0 0 0 4px #f0c97b,
                0 16px 35px rgba(0,0,0,0.35);
            position: relative;
        }

        .marquee::before,
        .marquee::after {
            content: "";
            position: absolute;
            left: 20px;
            right: 20px;
            height: 10px;
            background-image: radial-gradient(circle, #f4c469 35%, transparent 36%);
            background-size: 24px 10px;
            background-repeat: repeat-x;
        }

        .marquee::before {
            top: -16px;
        }

        .marquee::after {
            bottom: -16px;
        }

        .marquee h1 {
            font-family: "Cinzel", serif;
            font-size: 56px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .marquee p {
            font-size: 18px;
            color: #5b3417;
            max-width: 680px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .sub-note {
            margin: 18px auto 36px;
            color: #f1d5a7;
            max-width: 760px;
            line-height: 1.8;
            font-size: 15px;
        }

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .hero-actions a {
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .primary-btn {
            background: linear-gradient(135deg, #f2c572, #d9982f);
            color: #2c1709;
            box-shadow: 0 10px 24px rgba(217, 152, 47, 0.28);
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(217, 152, 47, 0.35);
        }

        .secondary-btn {
            background: rgba(255,255,255,0.08);
            color: #ffe2b5;
            border: 1px solid rgba(255, 211, 145, 0.22);
        }

        .secondary-btn:hover {
            background: rgba(255,255,255,0.14);
            transform: translateY(-2px);
        }

        .feature-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-top: 20px;
        }

        .feature-card {
            background: linear-gradient(180deg, rgba(77, 39, 16, 0.86), rgba(45, 23, 11, 0.9));
            border: 1px solid rgba(255, 205, 130, 0.12);
            border-radius: 22px;
            padding: 24px;
            text-align: left;
            box-shadow: 0 12px 28px rgba(0,0,0,0.22);
        }

        .feature-card small {
            color: #e3b970;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 11px;
            display: block;
            margin-bottom: 10px;
        }

        .feature-card h3 {
            font-family: "Cinzel", serif;
            font-size: 23px;
            margin-bottom: 10px;
            color: #fff0d2;
        }

        .feature-card p {
            color: #efd7b1;
            line-height: 1.75;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .feature-row {
                grid-template-columns: 1fr;
            }

            .marquee h1 {
                font-size: 38px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 18px;
            }

            .hero {
                padding: 35px 20px 40px;
            }

            .top-bar {
                justify-content: center;
                text-align: center;
            }

            .brand {
                flex-direction: column;
            }

            .marquee {
                padding: 18px 16px;
            }

            .marquee h1 {
                font-size: 29px;
            }

            .marquee p {
                font-size: 15px;
            }

            .sub-note {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="page-overlay">

        <div class="top-bar">
            <div class="brand">
                <img src="{{ asset('images/jethroLogo.jpeg') }}" alt="IT2R5 Cinema Logo">

                <div class="brand-text">
                    <h2>IT2R5 CINEMA</h2>
                    <span>Movie Listing System</span>
                </div>
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

        <section class="hero">
            <div class="hero-logo">
                <img src="{{ asset('images/jethroLogo.jpeg') }}" alt="Cinema Logo">
            </div>

            <div class="marquee">
                <h1>Welcome to the Movies</h1>
                <p>
                    Step into IT2R5 Cinema and experience a movie listing system designed with the warmth,
                    glamour, and charm of a classic theater night.
                </p>
            </div>

            <p class="sub-note">
                Browse films, manage listings, and enjoy a dashboard inspired by the golden atmosphere
                of a real cinema lobby. Simple to use, elegant to look at, and built to match your theme.
            </p>

            <div class="hero-actions">
                @auth
                    <a href="{{ route('dashboard') }}" class="primary-btn">Enter Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="primary-btn">Create Account</a>
                    <a href="{{ route('login') }}" class="secondary-btn">Log In</a>
                @endauth
            </div>

            <div class="feature-row">
                <div class="feature-card">
                    <small>Now Showing</small>
                    <h3>Cinema Experience</h3>
                    <p>
                        A welcome page styled like a real movie theater entrance, with a glowing marquee,
                        premium layout, and warm cinematic mood.
                    </p>
                </div>

                <div class="feature-card">
                    <small>Movie Listings</small>
                    <h3>Elegant Interface</h3>
                    <p>
                        Your CRUD system now feels closer to a branded film platform instead of a plain
                        dashboard, while still staying clean and usable.
                    </p>
                </div>

                <div class="feature-card">
                    <small>Featured</small>
                    <h3>Classic Theater Theme</h3>
                    <p>
                        Built with rich gold highlights, dark wood tones, and poster-inspired sections
                        based directly on the cinema images you sent.
                    </p>
                </div>
            </div>
        </section>

    </div>
</body>
</html>