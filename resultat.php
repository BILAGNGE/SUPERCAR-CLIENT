<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM client
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

// Connexion à la base de données pour les données de voiture
$mysqli_voiture = require __DIR__ . "/database.php";

// Récupération des données de voiture depuis la base de données
$sql_voiture = "SELECT * FROM voiture";
$result_voiture = $mysqli_voiture->query($sql_voiture);

$marque = $_POST['marque'];
echo $marque;

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Voitures</title>
    <meta name="description" content="Supercar sales website">
    <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-v2-Modal--Full-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/Contact-FormModal-Contact-Form-with-Google-Map.css">
    <link rel="stylesheet" href="assets/css/divider-text-middle.css">
    <link rel="stylesheet" href="assets/css/Feature-Block-Image-Three-With-Full-Wide-Screen.css">
    <link rel="stylesheet" href="assets/css/Form-Search.css">
    <link rel="stylesheet" href="assets/css/Image-Tab-Gallery-Horizontal.css">
    <link rel="stylesheet" href="assets/css/Login-Box-En-login-box-en.css">
    <link rel="stylesheet" href="assets/css/Ludens---4-Show-Details.css">
    <link rel="stylesheet" href="assets/css/Ludens-Client---Login-Dropdown.css">
    <link rel="stylesheet" href="assets/css/Navbar-with-menu-and-login-km-Navbar.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form-.css">
    <link rel="stylesheet" href="assets/css/Responsive-Form-Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="assets/css/Search-Input-responsive.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/Sign-Up-Form---Gabriela-Carvalho.css">
    <link rel="stylesheet" href="assets/css/Single-Page-Contact-Us-Form.css">
    <link rel="stylesheet" href="assets/css/Swipe-Slider-7-styles.min.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/css/Voitures.css" media="screen">
</head>

<body>
    <br><br><br>


    <nav class="fixed-top bg-white">
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler text-primary border-0" data-bs-target="#navcol-1"><span><i class="fas fa-bars fs-4"></i></span></button>
            <div></div>
            <header id="header-2"></header>
            <div class="logo">
                <a class="navbar-brand d-flex align-items-center logo" href="Accueil.php">
                  <img src="assets/img/logo.jpg" alt="Supercar Logo">
                </a>
              </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="Accueil.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="Voitures.php">Voitures<br></a></li>
                    <li class="nav-item"><a class="nav-link" href="Demande d_essai1.php">Demande d’Essai<br></a></li>
                    <li class="nav-item"><a class="nav-link" href="Evenement.php">Évenement</a></li>
                    <li class="nav-item"><a class="nav-link" href="Contactez-nous.php">Contactez-nous</a></li>
                    </ul>
            </div>

            <?php if (isset($user)): ?>

                <div class="dropdown show">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>&nbsp;&nbsp;<?= htmlspecialchars($user["name"]) ?>&nbsp;
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
                        <a class="dropdown-item" href="Liste_demande.php">Liste des demandes</a>
                    </div>
                </div>

            <?php else: ?>

                <div class="dropdown show">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="Se connecter.php">Se connecter</a>
                        <a class="dropdown-item" href="S_inscrire.php">S'inscrire</a>
                    </div>
                </div>

            <?php endif; ?>
            

            </div>
        </div>
    </nav>
    </nav>




<div style="text-align:center;">
    <h2 class="divider-style" style="margin-top: 25px;"><span>Vos résulats de recherche</span></h2>
</div>


  <!-- Voici nos listes de voitures -->
  <section id="voitures">
    <div class="container py-5">
      <!-- Listes de voitures par marque -->
      <div class="listes">
           
                
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
$mysqli = require __DIR__ . "/database.php";
if (isset($_POST['marque'])) {
    $marque = $_POST['marque'];
    $sql_recherche = "SELECT * FROM voiture WHERE marque LIKE '%$marque%' or modele LIKE '%$marque%' or type LIKE '%$marque%' or annee LIKE '%$marque%'";
    $slq_marque = mysqli_query($mysqli, $sql_recherche);

    if ($slq_marque->num_rows > 0) {
        while ($row_voiture = mysqli_fetch_assoc($slq_marque)) {
            echo "<form action='Détails.php' method='post'>";
            echo "<div class='col'>";
            echo "<div class='card shadow overflow-hidden'>";
            echo "<a href='Détails.php?id=" . $row_voiture['id_voiture'] . "'><img src='assets/img/VOITURE/" . $row_voiture['image1'] . "' class='card-img-top' alt='" . $row_voiture['marque'] . " " . $row_voiture['modele'] . "'></a>";
            echo "<div class='card-body p-3'>";
            echo "<h5 class='card-title mb-1'>" . $row_voiture['marque'] . "<br>" . $row_voiture['modele'] . "</h5>";
            echo "<p class='card-text mb-0'><small>" . $row_voiture['annee'] . " | " . $row_voiture['type'] . "</small></p>";
            echo "<p class='card-text fs-4 my-4'>RS " . $row_voiture['prix'] . "</p>";
            echo "<ul class='list-inline fs-6'>";
            $rating = $row_voiture['rating'];
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating) {
                    echo "<li class='list-inline-item'><i class='fas fa-star text-warning'></i></li>";
                } else {
                    echo "<li class='list-inline-item'><i class='far fa-star text-muted'></i></li>";
                }
            }
            echo "</ul>";
            echo "<div class='d-grid gap-2'>";
            echo "<a href='Détails.php?id=" . $row_voiture['id_voiture'] . "' class='btn btn-primary'>Détails</a>";
            echo "<a href='Demande d_essai.php?id=" . $row_voiture['id_voiture'] . "' class='btn btn-primary'>Demander en essai</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</form>";
        }
    } else {
        echo '<h2 align="center">Aucun résultat ne correspond à votre recherche</h2>';
    }
}

mysqli_close($mysqli);
?>

                </div>

      </div>
    </div>
  </section>

<br><br><br>




<footer id="myFooter" style="padding-bottom: 0px;margin-bottom: 0px;margin-top: 0px;">
        <div class="container-fluid" style="margin-bottom: -103px;padding-bottom: 28px;">
            <div class="row text-center">
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="logo" style="margin-top:35px;"><a href="Accueil.php">&nbsp;<a href="Accueil.php">
                          <img src="assets/img/logo.jpg" alt="Supercar Logo">
                        </a>&nbsp;</a></h1>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <h5>Commencer</h5>
                    <ul>
                        <li><a href="Accueil.php">Accueil</a></li>
                        <li><a href="Voitures.php">Voitures<br></a></li>
                        <li><a href="Demande d_essai1.php">Demande d'essai</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-md-2">
                    <h5>Nos voitures</h5>
                    <ul>
                        <li><a href="Voitures.php">Marques</a></li>
                        <li><a href="Détails.php">Détails voitures<br></a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-2">
                    <h5>Nos évènements</h5>
                </div>
                <div class="col-md-3 social-networks">
                    <div></div><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><button class="btn btn-primary" href="Contactez-nous.html" style="margin-top: 5px;padding-left: 0px;padding-right: 0px;" type="button" onclick="window.location.href='Contactez-nous.php'">Contactez-nous</button><button class="btn btn-primary" style="margin-top: 5px;padding-left: 0px;padding-right: 0px;" type="button" onclick="window.location.href='Politiques de confidentialité.php'">Politiques de confidentialité</button>
                </div>
            </div>
            <div class="row footer-copyright" style="margin-bottom: -30px; margin-top: -60px;">
                <div class="col-lg-12">
                    <p>© 2023 Supercar ~ Designed By&nbsp;<a href="#">Anditiana - Kim - Loïc.</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Contact-FormModal-Contact-Form-with-Google-Map.js"></script>
    <script src="assets/js/Image-Tab-Gallery-Horizontal.js"></script>
    <script src="assets/js/Swipe-Slider-7.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>