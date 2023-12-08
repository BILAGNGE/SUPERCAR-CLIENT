<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: Se connecter.php");
    exit();
}

// Vérifier si le formulaire de modification a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_demande"])) {
    // Connexion à la base de données
    $servername = "mysql-brayanloic.alwaysdata.net";
    $username = "338019";
    $password = "#Brayan250#alwaysdata";
    $dbname = "brayanloic_supercar";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Vérifier la connexion à la base de données
    if (!$conn) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Récupérer les données du formulaire
    $id_demande = $_POST["id_demande"];
    $nouvelle_voiture = $_POST["nouvelle_voiture"];
    $date_essai = $_POST["date_essai"];
    $heure = $_POST["heure"];
    $commentaire = $_POST["commentaire"];

    // Mettre à jour la demande d'essai dans la base de données
    $sql = "UPDATE demande_essai SET id_voiture = '$nouvelle_voiture', date_debut = '$date_essai', heure = '$heure', commentaire = '$commentaire' WHERE id_demande = '$id_demande'";

    if (mysqli_query($conn, $sql)) {
        header("Location: Liste_demande.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de la demande d'essai : " . mysqli_error($conn);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    // Rediriger vers la page Liste_demande.php si le formulaire n'a pas été soumis
    header("Location: Liste_demande.php");
    exit();
}
?>
