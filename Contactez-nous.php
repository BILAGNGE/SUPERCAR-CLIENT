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
    <title>Contactez-nous</title>
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
                        <li class="nav-item"><a class="nav-link" href="Demande d_essai1.php">Demande d’Essai<br></a></li>
                        <li class="nav-item"><a class="nav-link" href="Evenement.php">Évenement</a></li>
                        <li class="nav-item"><a class="nav-link active" href="Contactez-nous.php">Contactez-nous</a></li>
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

    
<br><br><br>


<div style="text-align:center;">
  <h2 class="divider-style" style="margin-top: 25px;"><span>Contactez-nous</span></h2>
</div>


<div style="margin-top: 23px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6" style="background-color: #fff;">

        <?php 
          echo "<div class='form-group row'>";
          echo "<label for='email' class='col-md-4 col-form-label text-md-right'>Nom :</label>";
          echo "<div class='col-md-6'>".$user["name"]."</div>";
          echo "</div>";

          echo "<div class='form-group row'>";
          echo "<label for='email' class='col-md-4 col-form-label text-md-right'>Prénom :</label>";
          echo "<div class='col-md-6'>".$user["prenom"]."</div>";
          echo "</div>";

          echo "<div class='form-group row'>";
          echo "<label for='email' class='col-md-4 col-form-label text-md-right'>Adresse e-mail :</label>";
          echo "<div class='col-md-6'>".$user["email"]."</div>";
          echo "</div>";
        ?>

        <form action="envoi_email.php" method="POST">
        <input type="hidden" name="id_client" value="<?= $_SESSION["user_id"] ?>">
          <div class="form-group mb-3" style="margin-bottom: 17px;">
            <textarea name="message" style="width: 330px;padding-bottom: 33px;" placeholder="Message" required=""></textarea>
          </div>
          <div class="form-group mb-3">
            <button class="btn btn-info" type="submit" name="envoyer_message" style="width: 330px;">Envoyer</button>
          </div>
        </form>
      </div>
      <div class="col-md-6" style="padding-left: 20px;padding-right: 20px;background-color: #ffffff;">
        <fieldset></fieldset>
        <legend style="margin-top: 10px;"><i class="fas fa-car"></i>&nbsp;Supercar&nbsp;</legend>
        <p></p>
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td><i class="fas fa-map-marker-alt" style="height: 24px;width: 24px;"></i></td>
                <td>Grand Baie</td>
              </tr>
              <tr></tr>
              <tr>
                <td><i class="fa fa-phone" style="width: 24px;height: 24px;"></i></td>
                <td>+230 5784 6927</td>
              </tr>
              <tr>
                <td><i class="fa fa-envelope" style="width: 24px;height: 24px;"></i></td>
                <td>anditianarzf@gmail.com<br>Bilagnge@gmail.com<br>kimstevine777@gmail.com</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>




    
    
<br><br>


    <center><div class="row">
    <div class="col-md-12">
        <fieldset>
            <legend><i class="fa fa-location-arrow"></i> Localisation</legend>
        </fieldset><br>
        <div class="map-responsive mx-auto">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3743.27659336746!2d57.4883728!3d-20.2473605!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5b1ef2170f63%3A0xd1a78020fc096491!2sMCCI%20BUSINESS%20SCHOOL%20(Mauritius%20Chamber%20of%20Commerce%20and%20Industry)!5e0!3m2!1sfr!2smu!4v1683834175896!5m2!1sfr!2smu" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div></center>

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
</body>

</html>