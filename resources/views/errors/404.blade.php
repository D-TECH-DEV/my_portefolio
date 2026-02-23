<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Page Non Trouvée | You-Soft</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Serif:wght@700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --bg-color: #0a1128;
            --accent-color: #dca73a;
            --text-base: #aab8c5;
            --text-heading: #FFFFFF;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-base);
            font-family: 'Lato', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        .error-container {
            text-align: center;
            max-width: 600px;
            padding: 40px;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-code {
            font-family: 'Noto Serif', serif;
            font-size: 12rem;
            font-weight: 700;
            color: var(--accent-color);
            line-height: 1;
            margin-bottom: 0;
            opacity: 0.15;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            user-select: none;
        }

        h1 {
            font-family: 'Noto Serif', serif;
            font-size: 3rem;
            color: var(--text-heading);
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .btn-home {
            background-color: var(--accent-color);
            color: var(--bg-color);
            font-weight: 700;
            padding: 12px 35px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 2px solid var(--accent-color);
        }

        .btn-home:hover {
            background-color: transparent;
            color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(220, 167, 58, 0.2);
        }

        .decorative-line {
            width: 60px;
            height: 4px;
            background-color: var(--accent-color);
            margin: 0 auto 30px;
            border-radius: 2px;
        }

        /* Subtle ambient glow */
        .glow {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(220, 167, 58, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="glow" style="top: 10%; left: 10%;"></div>
    <div class="glow" style="bottom: 10%; right: 10%;"></div>

    <div class="error-code">404</div>

    <div class="error-container">
        <div class="decorative-line"></div>
        <h1>Oups ! Page Perdue</h1>
        <p>Il semble que le chemin que vous avez emprunté n'existe plus ou a été déplacé. Ne vous inquiétez pas, on peut
            toujours repartir de zéro.</p>

        <a href="{{ route('index') }}" class="btn-home">
            <i class="bi bi-house-door"></i>
            Retour à l'accueil
        </a>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>