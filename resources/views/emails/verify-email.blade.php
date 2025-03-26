<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vérification de votre adresse email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-height: 80px;
        }
        .content {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            font-size: 12px;
            color: #777;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('app-assets/images/logo/iug.png') }}" alt="IUG Logo">
    </div>

    <div class="content">
        <h2>Bonjour {{ $user->name }},</h2>

        <p>Merci de vous être inscrit sur la plateforme IUG Academia. Pour finaliser votre inscription, veuillez vérifier votre adresse email en cliquant sur le bouton ci-dessous :</p>

        <div style="text-align: center;">
            <a href="{{ $verificationUrl }}" class="button">Vérifier mon adresse email</a>
        </div>

        <p>Si le bouton ne fonctionne pas, vous pouvez également copier et coller le lien suivant dans votre navigateur :</p>
        <p>{{ $verificationUrl }}</p>

        <p>Ce lien expirera dans 24 heures.</p>

        <p>Si vous n'avez pas créé de compte sur IUG Academia, veuillez ignorer cet email.</p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} IUG Academia. Tous droits réservés.</p>
        <p>Ce message a été envoyé automatiquement, merci de ne pas y répondre.</p>
    </div>
</body>
</html>