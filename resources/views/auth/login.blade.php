<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | You-Soft Admin</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-5.14.0.min.css') }}">
    <style>
        :root {
            --bg-color: #0c1128;
            --card-bg: rgba(255, 255, 255, 0.05);
            --accent-color: #dca73a;
            --text-heading: #ffffff;
            --text-base: #a0a0a0;
            --input-bg: rgba(255, 255, 255, 0.08);
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            background-color: var(--bg-color);
            background-image:
                radial-gradient(at 0% 0%, rgba(220, 167, 58, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(220, 167, 58, 0.05) 0px, transparent 50%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            margin: 0;
            overflow: hidden;
        }

        .login-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 150px;
        }

        h2 {
            color: var(--text-heading);
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
        }

        .sub-title {
            color: var(--text-base);
            text-align: center;
            margin-bottom: 35px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: var(--text-heading);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            color: #fff;
            padding: 12px 15px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(220, 167, 58, 0.1);
            color: #fff;
        }

        .btn-login {
            background: var(--accent-color);
            border: none;
            border-radius: 12px;
            color: #0c1128;
            font-weight: 600;
            padding: 12px;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #cba035;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(220, 167, 58, 0.3);
        }

        .alert {
            background: rgba(220, 38, 38, 0.1);
            border: 1px solid rgba(220, 38, 38, 0.2);
            color: #ef4444;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-base);
            font-size: 14px;
            cursor: pointer;
        }

        .remember-me input {
            accent-color: var(--accent-color);
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            color: var(--text-base);
            font-size: 13px;
        }

        .footer-text a {
            color: var(--accent-color);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="logo">
            <h1 style="color: #fff; font-size: 24px;">You-<span>Soft</span></h1>
        </div>

        <h2>Bon retour !</h2>
        <p class="sub-title">Connectez-vous pour gérer votre portfolio</p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Adresse Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Entrez votre email" required autofocus>
            </div>

            <div class="form-group">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe"
                    required>
            </div>

            <div class="form-group d-flex justify-content-between align-items-center mb-4">
                <label class="remember-me">
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="btn-login">Se connecter</button>
        </form>

        <div class="footer-text">
            © {{ date('Y') }} <a href="{{ route('index') }}">You-Soft</a>. Tous droits réservés.
        </div>
    </div>
</body>

</html>