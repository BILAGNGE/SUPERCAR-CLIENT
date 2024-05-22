<?php

session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["user_id"])) {
    
    // Récupérer les informations de l'utilisateur depuis la base de données
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM client WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    
    // Afficher la page de demande d'essai pour l'utilisateur connecté

} else {
    header("Location: Se connecter.php");
    exit();
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Demande d'essai</title>
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
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider-mycarousel.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
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
    <style>
        .btn-custom {
            width: 200px;
            margin-top: 20px;
            }
    </style>
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
                        <li class="nav-item"><a class="nav-link" href="Voitures.php">Voitures<br></a></li>
                        <li class="nav-item"><a class="nav-link active" href="Demande d_essai1.php">Demande d’Essai<br></a></li>
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
        <h2 class="divider-style" style="margin-top: 25px;"><span>Demandes d'essai</span></h2>
    </div>

    <br>




<?php
    echo "<div class='container'>";
    echo "<div class='row justify-content-center'>";
    echo "<div class='col-md-8'>";
    echo "<div class='card border-0'>";
    echo "<div class='card-header'>";
    echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href='Voitures.php'\">Choisir une voiture</button>";
    echo "</div>";

    echo "<div class='card-body'>";
    echo "<form action='traitement_demande_essai.php' method='POST'>";

    echo "<div class='form-group row'>";
    echo "<label for='nom' class='col-md-4 col-form-label text-md-right'>Nom</label>";
    echo "<div class='col-md-6'>".$user["prenom"]." ".$user["name"]."</div>";
    echo "</div>";

    echo "<div class='form-group row'>";
    echo "<label for='email' class='col-md-4 col-form-label text-md-right'>Adresse e-mail</label>";
    echo "<div class='col-md-6'>".$user["email"]."</div>";
    echo "</div>";

    echo "<div class='form-group row'>";
    echo "<label for='telephone' class='col-md-4 col-form-label text-md-right'>Téléphone</label>";
    echo "<div class='col-md-6'>+230 ".$user["telephone"]."</div>";
    echo "</div>";

    echo "<div class='form-group row'>";
    echo "<label for='date_debut' class='col-md-4 col-form-label text-md-right'>Date de début d'essai</label>";
    echo "<div class='col-md-6'>";
    echo "<input id='date_debut' type='date' class='form-control' name='date_debut' required>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group row'>";
    echo "<label for='heure' class='col-md-4 col-form-label text-md-right'>Heure</label>";
    echo "<div class='col-md-6'>";
    echo "<input id='heure' type='time' class='form-control' name='heure' required>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group row'>";
    echo "<label for='commentaire' class='col-md-4 col-form-label text-md-right'>Commentaire</label>";
    echo "<div class='col-md-6'>";
    echo "<textarea id='commentaire' class='form-control' name='commentaire' required></textarea>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group row'>";
    echo "<div class='col-md-6 offset-md-4'>";
    echo "<div class='form-check'>";
    echo "<input class='form-check-input' type='checkbox' name='accepter_conditions' id='accepter_conditions' required>";
    echo "<label class='form-check-label' for='accepter_conditions'>J'accepte les termes de la politique de confidentialité</label>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<div class='form-group row mb-0>";
    echo "<div class='col-md-6 offset-md-4'>";
    echo "<center>";
    echo "<button type='submit' class='btn btn-primary btn-custom' disabled>Valider</button>";
    echo "</center>";
    echo "</div>";

    echo "</div>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    echo "<!-- Modal pour choisir une voiture -->";
    echo "<div class='modal fade' id='choisirVoitureModal' tabindex='-1' role='dialog' aria-labelledby='choisirVoitureModalLabel' aria-hidden='true'>";
    echo "<div class='modal-dialog' role='document'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title' id='choisirVoitureModalLabel'>Choisir une voiture</h5>";
    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
    echo "<span aria-hidden='true'>&times;</span>";
    echo "</button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "<!-- Contenu du modal pour choisir une voiture -->";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>";
    echo "<button type='button' class='btn btn-primary' data-dismiss='modal' disabled>Choisir</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

?>

<br><br>



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

    
<script>
    // Désactiver le bouton "Valider" si la case "J'accepte les termes de la politique de confidentialité" n'est pas cochée
    const accepterConditions = document.getElementById('accepter_conditions');
    const validerBtn = document.querySelector('button[type="submit"]');
  
    accepterConditions.addEventListener('change', function() {
      if (accepterConditions.checked) {
        validerBtn.disabled = false;
      } else {
        validerBtn.disabled = true;
      }
    });
</script>
</body>

</html>