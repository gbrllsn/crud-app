<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatre Gala</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: "Poppins", sans-serif;
            min-height: 100vh;
            color: #f8e9ec;
            background:
                linear-gradient(rgba(80, 0, 20, 0.75), rgba(40, 0, 10, 0.85)),
                url("{{ asset('images/maui.jpeg') }}") center/cover no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            background: rgba(60, 0, 20, 0.75);
            border-radius: 30px;
            padding: 60px;
            text-align: center;
            backdrop-filter: blur(6px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
        }

        .logo img {
            width: 120px;
            margin-bottom: 20px;
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: 58px;
            margin-bottom: 20px;
        }

        p {
            max-width: 600px;
            margin: 0 auto 30px;
            color: #e8cbd2;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .actions a {
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 999px;
            background: #c94f6d;
            color: white;
            transition: 0.3s;
        }

        .actions a:hover {
            background: #ff6a8a;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">

    <div class="logo">
        <img src="{{ asset('images/mauiLogo.jpeg') }}">
    </div>

    <h1>Welcome to Theatre Gala</h1>

    <p>
        Step onto the stage and explore a beautifully designed movie listing system inspired
        by theatrical performances, dramatic visuals, and elegant presentation.
    </p>

    <div class="actions">
        @auth
            <a href="{{ route('dashboard') }}">Enter Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>

</div>

</body>
</html>