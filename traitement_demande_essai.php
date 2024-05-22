<?php
// Connexion à la base de données
$mysqli = require __DIR__ . "/database.php";

// Vérifier si l'utilisateur est connecté
session_start();

// Récupérer l'id_client à partir de la session
if (isset($_SESSION["user_id"])) {
    $client_id = $_SESSION["user_id"];
} else {
    header("Location: Se connecter.php");
    exit();
}

// Récupérer les autres données du formulaire
$id_voiture = $_POST['id_voiture'];
$date_debut = $_POST['date_debut'];
$heure = $_POST['heure'];
// Échapper les caractères spéciaux dans le texte du commentaire
$commentaire = mysqli_real_escape_string($mysqli, $_POST['commentaire']);

// Récupérer les informations de la voiture à partir de son ID
$sql_voiture = "SELECT marque, modele, type, annee, prix FROM voiture WHERE id_voiture = '$id_voiture'";
$result_voiture = mysqli_query($mysqli, $sql_voiture);

if (mysqli_num_rows($result_voiture) > 0) {
    // Récupérer les données de la voiture
    $row_voiture = mysqli_fetch_assoc($result_voiture);
    $marque = $row_voiture['marque'];
    $modele = $row_voiture['modele'];
    $type = $row_voiture['type'];
    $annee = $row_voiture['annee'];
    $prix = $row_voiture['prix'];
} else {
    echo "Aucune voiture trouvée avec cet ID.";
}

// Préparer la requête SQL pour insérer les données dans la table demande_essai
$sql = "INSERT INTO demande_essai (id_voiture, date_debut, heure, commentaire, id_client) VALUES ('$id_voiture', '$date_debut', '$heure', '$commentaire', '$client_id')";

// Exécuter la requête SQL
if (mysqli_query($mysqli, $sql)) {
    // Rediriger l'utilisateur vers une page de confirmation
    header("Location: confirmation_demande_essai.php");
    exit();
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($mysqli);
}

// Fermer la connexion à la base de données
mysqli_close($mysqli);
?>
