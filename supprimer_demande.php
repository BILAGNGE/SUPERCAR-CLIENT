<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: Se connecter.php");
    exit();
}

// Vérifier si l'ID de la demande à supprimer est présent dans l'URL
if (isset($_GET["id"])) {
    // Récupérer l'ID de la demande depuis l'URL
    $id_demande = $_GET["id"];
    
    // Connexion à la base de données
    $mysqli = require __DIR__ . "/database.php";

    
    // Vérifier si l'utilisateur est autorisé à supprimer cette demande
    $user_id = $_SESSION["user_id"];
    $sql_check = "SELECT * FROM demande_essai WHERE id_demande = '$id_demande' AND id_client = '$user_id'";
    $result_check = mysqli_query($mysqli, $sql_check);
    
    if (mysqli_num_rows($result_check) > 0) {
        // Supprimer la demande d'essai de la base de données
        $sql_delete = "DELETE FROM demande_essai WHERE id_demande = '$id_demande'";
        
        if (mysqli_query($mysqli, $sql_delete)) {
            header("Location: Liste_demande.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de la demande d'essai : " . mysqli_error($mysqli);
        }
    } else {
        // Rediriger si l'utilisateur n'est pas autorisé à supprimer cette demande
        header("Location: Liste_demande.php");
        exit();
    }
    
    // Fermer la connexion à la base de données
    mysqli_close($mysqli);
} else {
    // Rediriger si l'ID de la demande n'est pas présent dans l'URL
    header("Location: Liste_demande.php");
    exit();
}
?>
