<?php

$mysqli = require __DIR__ . "/database.php";

// Récupération des données du formulaire
$id_client = $_POST['id_client']; // Récupérer l'ID du client depuis le formulaire
$message = mysqli_real_escape_string($mysqli, $_POST['message']);

// Insertion des données dans la base de données
$sql = "INSERT INTO contact (id_client, message) VALUES ('$id_client', '$message')";

if ($mysqli->query($sql) === TRUE) {
    // Envoi de l'email
    $to = "Bilagnge@gmail.com";
    $subject = "SUPERCAR : Nouveau message de $nom $prenom";
    $body = "Vous avez reçu un nouveau message de $nom $prenom ($email):\n\n$message";
    mail($to, $subject, $body);

    // Redirection vers une page de confirmation
    header("Location: confirmation_contact.php");
    exit;
} else {
    echo "Erreur: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>
