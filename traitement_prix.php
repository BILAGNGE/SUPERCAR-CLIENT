<?php

include("database.php");

$id = $_POST['id_voiture'];
$nouveau = $_POST['nouveau_prix'];
$sql = "SELECT * FROM voiture WHERE id_voiture=$id";
$resultat = mysqli_query($mysqli, $sql);

if ($resultat) {
    $row = mysqli_fetch_assoc($resultat);
    $ancien_prix = $row['prix'];
    $prix_max = $ancien_prix * 20 / 100;
    $prix_max = $prix_max + $ancien_prix;

    if ($nouveau < $prix_max) {

        $sql = "UPDATE voiture SET prix = '$nouveau' WHERE id_voiture = $id";
        $resultat1 = mysqli_query($mysqli, $sql);
        if ($resultat1) {
            echo "Modification effectuée avec succès";
        } else {
            echo "Erreur lors de la modification";
        }
    } else {
        echo "Le nouveau prix dépasse le prix maximum autorisé";
    }
}
?>
