<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: Se connecter.php");
    exit();
}

// Connexion à la base de données
$mysqli = require __DIR__ . "/database.php";

// Récupérer l'ID de la demande d'essai à modifier depuis l'URL
if (isset($_GET["id"])) {
    $id_demande = $_GET["id"];
} else {
    header("Location: Liste_demande.php");
    exit();
}

// Récupérer les informations de la demande d'essai depuis la base de données
$sql_demande = "SELECT * FROM demande_essai WHERE id_demande = '$id_demande'";
$result_demande = mysqli_query($mysqli, $sql_demande);

if ($result_demande) {
    $demande = mysqli_fetch_assoc($result_demande);
} else {
    header("Location: Liste_demande.php");
    exit();
}

// Vérifier si l'utilisateur est autorisé à modifier cette demande
if ($_SESSION["user_id"] != $demande["id_client"]) {
    header("Location: Liste_demande.php");
    exit();
}

// Récupérer la liste de toutes les voitures depuis la base de données
$sql_voitures = "SELECT * FROM voiture";
$result_voitures = mysqli_query($mysqli, $sql_voitures);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modifier la demande d'essai</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Modifier la demande d'essai</h1>
        <form method="POST" action="traitement_modifier_demande.php">
            <input type="hidden" name="id_demande" value="<?php echo $demande['id_demande']; ?>">
            <div class="form-group">
                <label for="nouvelle_voiture">Choisir une autre voiture :</label>
                <select class="form-control" id="nouvelle_voiture" name="nouvelle_voiture">
                    <?php
                    while ($row_voiture = mysqli_fetch_assoc($result_voitures)) {
                        echo '<option value="' . $row_voiture['id_voiture'] . '"';
                        if ($demande['id_voiture'] == $row_voiture['id_voiture']) {
                            echo ' selected';
                        }
                        echo '>' . $row_voiture['marque'] . ' ' . $row_voiture['modele'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date_essai">Date d'essai :</label>
                <input type="date" class="form-control" id="date_essai" name="date_essai" value="<?php echo $demande['date_debut']; ?>" required>
            </div>
            <div class="form-group">
                <label for="heure">Heure :</label>
                <input type="time" class="form-control" id="heure" name="heure" value="<?php echo $demande['heure']; ?>" required>
            </div>
            <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <textarea class="form-control" id="commentaire" name="commentaire" rows="4"><?php echo $demande['commentaire']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="Liste_demande.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>

</html>
