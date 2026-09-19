<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Inscription réussie | ÉcoVie</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f8f4;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success {
            width: 90%;
            max-width: 500px;

            background: white;

            padding: 50px 35px;

            border-radius: 20px;

            text-align: center;

            box-shadow:
                0 15px 40px rgba(0,0,0,0.08);
        }

        .icon {
            width: 70px;
            height: 70px;

            margin: 0 auto 25px;

            border-radius: 50%;

            background: #e5f5e9;
            color: #238b52;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 35px;
        }

        h1 {
            color: #123c28;
            margin-bottom: 15px;
        }

        p {
            color: #68756d;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;

            padding: 14px 25px;

            background: #238b52;
            color: white;

            text-decoration: none;

            border-radius: 8px;

            font-weight: bold;
        }

        a:hover {
            background: #176b3d;
        }

    </style>

</head>

<body>

    <div class="success">

        <div class="icon">
            ✓
        </div>

        <h1>
            Inscription réussie !
        </h1>

        <p>
            Votre compte ÉcoVie a été créé avec succès.
            Vos informations sont enregistrées et votre compte
            restera disponible même après avoir fermé le site.
        </p>

        <a href="index.html">
            Retour à l'accueil
        </a>

    </div>

</body>

</html>