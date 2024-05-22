<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM client
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modification prix</title>
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
        /* Styles pour le formulaire */
        .supercar-form {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        }

        .supercar-form td {
        padding: 10px;
        text-align: center;
        }

        /* Styles pour les labels */
        .supercar-label {
        font-weight: bold;
        }

        /* Styles pour les inputs */
        .supercar-input {
        padding: 5px;
        width: 200px;
        border: 1px solid #ccc;
        }

        /* Styles pour le bouton */
        .supercar-button {
        padding: 10px 20px;
        background-color: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        }

        .supercar-button:hover {
        background-color: #555;
        }
    </style>

</head>

<body>
    <br><br><br>


    <nav class="fixed-top bg-white">
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler text-primary border-0" data-bs-target="#navcol-1"><span><i class="fas fa-bars fs-4"></i></span></button>
            
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
    </nav>
    </nav>


    <div style="text-align: center;margin-bottom: 45px;">
        <h2 class="divider-style" style="margin-top: 25px;"><span>Modification prix</span></h2>
    </div>


<?php

include("database.php");

if (isset($_POST['id_voiture'])) {
    $id = $_POST['id_voiture'];
    $sql = "SELECT * FROM voiture WHERE id_voiture=$id";
    $resultat = mysqli_query($mysqli, $sql);

    if ($resultat) {
        $row = mysqli_fetch_assoc($resultat);
        $ancien_prix = $row['prix'];
        $prix_max = $ancien_prix * 20 / 100;
        $prix_max = $prix_max + $ancien_prix;
        
        echo '
        <center><p>Suite à la nouvelle loi d`interdiction d`augmentation de prix de plus de 20%, le prix maximal pour cette voiture est : RS ' . $prix_max . '</p></center>
        <form action="traitement_prix.php" method="post">
            <table class="supercar-form">
                <tr>
                    <td class="supercar-label">Prix ancien</td>
                    <td class="supercar-label">Nouveau prix</td>
                </tr>
                <tr>
                    <td>' . $row['prix'] . '</td>
                    <td>
                        <input type="text" name="nouveau_prix" class="supercar-input">
                        <input type="hidden" name="id_voiture" value="' . $row['id_voiture'] . '">
                    </td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Modifier" class="supercar-button">
                    </td>
                </tr>
            </table>
        </form>
        ';
    }
}
?>




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