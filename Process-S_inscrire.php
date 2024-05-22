<?php

if (empty($_POST["name"])) {
    die("Le nom est réquis!");
}

if (empty($_POST["prenom"])) {
    die("Le Prénom est réquis!");
}

if (empty($_POST["telephone"])) {
    die("Le téléphone est réquis!");
}

if (empty($_POST["adresse"])) {
    die("L'adresse est réquis!");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Un e-mail valide est réquis!");
}

if (strlen($_POST["password"]) < 8) {
    die("Le mot de passe doit comporter au moins 8 caractères!");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Les mots de passe doivent être similaires!");
}

$password_hash = $_POST["password"];

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO client (name, prenom, telephone, adresse, email, password_hash)
        VALUES (?, ?, ?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssss",
                  $_POST["name"],
                  $_POST["prenom"],
                  $_POST["telephone"],
                  $_POST["adresse"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: S_inscrire-success.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("Cette e-mail possède déjà un compte!");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
