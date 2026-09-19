<?php

session_start();

require_once "config/database.php";


/* Vérifier si l'utilisateur est connecté */

if (!isset($_SESSION["user_id"])) {

    header("Location: connexion.html");
    exit;

}


$user_id = $_SESSION["user_id"];


/* Récupérer les informations */

$sql = "SELECT
            id,
            nom,
            postnom,
            prenom,
            email,
            telephone,
            ville,
            participation,
            date_inscription
        FROM utilisateurs
        WHERE id = ?";


$stmt = $pdo->prepare($sql);

$stmt->execute([$user_id]);

$user = $stmt->fetch();


/* Vérifier que l'utilisateur existe */

if (!$user) {

    session_destroy();

    header("Location: connexion.html");
    exit;

}


/* Texte de participation */

$participation = [

    "benevole" => "Bénévole",
    "donateur" => "Donateur",
    "partenaire" => "Partenaire",
    "membre" => "Membre"

];

$role = $participation[$user["participation"]] ?? $user["participation"];

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Mon compte - ÉcoVie</title>

    <link
        rel="stylesheet"
        href="css/compte.css"
    >

</head>


<body>


<header class="navbar">

    <a href="index.html" class="logo">
        ÉcoVie
    </a>


    <nav>

        <a href="index.html">
            Accueil
        </a>

        <a href="compte.php" class="active">
            Mon compte
        </a>

        <a href="deconnexion.php">
            Déconnexion
        </a>

    </nav>

</header>



<main class="account-container">


    <section class="account-header">

        <div class="avatar">

            <?= strtoupper(
                substr($user["prenom"], 0, 1)
            ) ?>

        </div>


        <div>

            <p class="welcome">
                Bienvenue sur votre espace
            </p>

            <h1>

                <?= htmlspecialchars($user["prenom"]) ?>

                <?= htmlspecialchars($user["nom"]) ?>

            </h1>

            <p class="member-type">

                <?= htmlspecialchars($role) ?>

            </p>

        </div>

    </section>



    <section class="account-content">


        <div class="card">


            <div class="card-header">

                <h2>
                    Informations personnelles
                </h2>

                <span>
                    Compte
                </span>

            </div>


            <div class="information-grid">


                <div class="information">

                    <label>
                        Nom
                    </label>

                    <p>
                        <?= htmlspecialchars($user["nom"]) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Postnom
                    </label>

                    <p>
                        <?= htmlspecialchars($user["postnom"]) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Prénom
                    </label>

                    <p>
                        <?= htmlspecialchars($user["prenom"]) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Adresse email
                    </label>

                    <p>
                        <?= htmlspecialchars($user["email"]) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Téléphone
                    </label>

                    <p>
                        <?= htmlspecialchars($user["telephone"]) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Ville
                    </label>

                    <p>
                        <?= htmlspecialchars($user["ville"]) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Type de participation
                    </label>

                    <p>
                        <?= htmlspecialchars($role) ?>
                    </p>

                </div>


                <div class="information">

                    <label>
                        Membre depuis
                    </label>

                    <p>

                        <?= date(
                            "d/m/Y",
                            strtotime($user["date_inscription"])
                        ) ?>

                    </p>

                </div>


            </div>

        </div>



        <div class="card actions-card">

            <h2>
                Mon espace
            </h2>

            <p>
                Retrouvez ici les principales actions
                disponibles sur votre compte ÉcoVie.
            </p>


            <div class="actions">


                <a href="index.html">

                    <span>←</span>

                    Retour à l'accueil

                </a>


                <a href="#">

                    <span>✓</span>

                    Mes participations

                </a>


                <a href="#">

                    <span>♻</span>

                    Mes actions écologiques

                </a>


                <a href="deconnexion.php" class="logout">

                    <span>↪</span>

                    Se déconnecter

                </a>


            </div>

        </div>


    </section>


</main>


<footer>

    <p>
        © 2026 ÉcoVie — Agir pour notre planète.
    </p>

</footer>


</body>

</html>