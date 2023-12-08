<?php
// Connexion à la base de données
$servername = "mysql-brayanloic.alwaysdata.net";
$username = "338019";
$password = "#Brayan250#alwaysdata";
$dbname = "brayanloic_supercar";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération des données du formulaire
$id_client = $_POST['id_client']; // Récupérer l'ID du client depuis le formulaire
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insertion des données dans la base de données
$sql = "INSERT INTO contact (id_client, message) VALUES ('$id_client', '$message')";

if ($conn->query($sql) === TRUE) {
    // Envoi de l'email
   header("location: Contactez-nous.php");
    // Redirection vers une page de confirmation
    header("Location: confirmation_contact.php");
    exit;
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
