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
    <title>Accueil</title>
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
                    <li class="nav-item"><a class="nav-link active" href="Accueil.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="Voitures.php">Voitures<br></a></li>
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

    
    
<div style="background-image:url(&quot;assets/img/BG-Accueil-2.jpg&quot;);height:600px;background-position:center;background-size:cover;background-repeat:no-repeat;">
    <div class="d-flex justify-content-center align-items-center" style="height: inherit;min-height: initial;width: 100%;position: absolute;left: 0;background-color: rgba(30,41,99,0.53);padding-top: 0px;margin-top: 0px;">
        <div class="d-flex align-items-center order-5" style="height:200px;">
            <form action="resultat.php" method="post" >
            <div style="text-align: center;margin-bottom: 45px;">
                <h1 style="margin-top: 25px; color: white;">Découvrez la <span>SUPERCAR</span> de vos rêves !</h1>
                <h4 style="color: #a9a9a9;">Essayez les voitures de luxe les plus exclusives au monde dès aujourd'hui. Réservez votre essai.</h4>
            </div>
                <div class="container pb-5 pt-5" style="margin-top: -48px;margin-bottom: -48px;padding-right: 290px;padding-left: 290px;">
                    <div class="input-group">
                        <span class="input-group-text" style="margin-bottom: 22px;margin-top: 5px;">
                            <i class="fa fa-search"></i>
                        </span>
                        <input class="form-control" type="text" name="marque" placeholder="Recherchez votre voiture ..." />
                        <button class="btn btn-light" style="margin-top: -16px; margin-right: 104px; margin-left: 100px;">Trouver</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<section style="background-color: #f8f9fa; padding: 60px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">Bienvenue chez Supercar</h2>
                <p>Supercar est le leader mondial dans la vente de voitures de luxe, offrant une expérience incomparable à nos clients depuis plus de deux décennies. Notre engagement envers l'excellence et la qualité supérieure fait de Supercar la destination ultime pour les amateurs de voitures haut de gamme.</p>
                <p>Nous proposons une sélection exceptionnelle de voitures de luxe des marques les plus prestigieuses au monde. Notre équipe d'experts est dévouée à vous fournir des conseils personnalisés pour vous aider à trouver la voiture de vos rêves.</p>
                <p>En plus de la vente de voitures de luxe, Supercar offre des services de demande d'essai, d'événements exclusifs et bien plus encore. Notre passion pour l'automobile se reflète dans tout ce que nous faisons, et nous sommes impatients de vous offrir une expérience inoubliable.</p>
            </div>
            <div class="col-md-6">
                <img src="assets/img/supercar-showroom.jpg" alt="Supercar Showroom" style="width: 130%; border-radius: 10px; margin-top: 50px;">
            </div>
        </div>
    </div>
</section>



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
        <div class="col-12 col-sm-6 col-md-2">
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