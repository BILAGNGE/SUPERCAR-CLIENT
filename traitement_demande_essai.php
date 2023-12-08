<?php
// Connexion à la base de données
$servername = "mysql-brayanloic.alwaysdata.net";
$username = "338019";
$password = "#Brayan250#alwaysdata";
$dbname = "brayanloic_supercar";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupérer l'id_voiture à partir de l'URL

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
$commentaire = mysqli_real_escape_string($conn, $_POST['commentaire']);

// Récupérer les informations de la voiture à partir de son ID
$sql_voiture = "SELECT marque, modele, type, annee, prix FROM voiture WHERE id_voiture = '$id_voiture'";
$result_voiture = mysqli_query($conn, $sql_voiture);

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
if (mysqli_query($conn, $sql)) {
    // Rediriger l'utilisateur vers une page de confirmation
    header("Location: confirmation_demande_essai.php");
    exit();
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
