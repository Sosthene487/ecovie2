<?php

session_start();

require_once "config/database.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: inscription.html");
    exit;

}


/* Récupération des données */

$nom = trim($_POST["nom"] ?? "");
$postnom = trim($_POST["postnom"] ?? "");
$prenom = trim($_POST["prenom"] ?? "");
$email = trim($_POST["email"] ?? "");
$telephone = trim($_POST["telephone"] ?? "");
$ville = trim($_POST["ville"] ?? "");
$participation = trim($_POST["participation"] ?? "");

$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";

$conditions = $_POST["conditions"] ?? "";


/* Vérification */

if (
    empty($nom) ||
    empty($postnom) ||
    empty($prenom) ||
    empty($email) ||
    empty($telephone) ||
    empty($ville) ||
    empty($participation) ||
    empty($password)
) {

    die("Veuillez remplir tous les champs.");

}


/* Email */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die("Adresse email invalide.");

}


/* Mot de passe */

if ($password !== $confirm_password) {

    die("Les mots de passe ne correspondent pas.");

}


if (strlen($password) < 8) {

    die("Le mot de passe doit contenir au moins 8 caractères.");

}


/* Conditions */

if (!$conditions) {

    die("Vous devez accepter les conditions.");

}


/* Vérification email */

$sql = "SELECT id FROM utilisateurs WHERE email = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$email]);


if ($stmt->fetch()) {

    die("Cette adresse email est déjà utilisée.");

}


/* Hash du mot de passe */

$password_hash = password_hash(
    $password,
    PASSWORD_DEFAULT
);


/* Enregistrement */

$sql = "INSERT INTO utilisateurs
(
    nom,
    postnom,
    prenom,
    email,
    telephone,
    ville,
    participation,
    password
)
VALUES
(
    ?, ?, ?, ?, ?, ?, ?, ?
)";


$stmt = $pdo->prepare($sql);

$stmt->execute([
    $nom,
    $postnom,
    $prenom,
    $email,
    $telephone,
    $ville,
    $participation,
    $password_hash
]);


/* Récupération de l'utilisateur */

$id = $pdo->lastInsertId();


/* Connexion automatique */

$_SESSION["user_id"] = $id;


header("Location: compte.php");

exit;

?>