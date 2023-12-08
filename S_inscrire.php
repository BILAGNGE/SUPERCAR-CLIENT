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
    <title>S'inscrire</title>
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
        <h2 class="divider-style" style="margin-top: 25px;"><span>S'inscrire</span></h2>
    </div>
    <form action="Process-S_inscrire.php" method="post" id="signup" novalidate>
        <div class="d-flex flex-column justify-content-center" id="login-box">
            <div class="login-box-content">
                <div class="fb-login box-shadow"><a class="d-flex flex-row align-items-center social-login-link" href="#"><i class="fa fa-facebook" style="margin-left:0px;padding-right:20px;padding-left:22px;width:56px;"></i>S'inscrire avec Facebook</a></div>
                <div class="gp-login box-shadow"><a class="d-flex flex-row align-items-center social-login-link" style="margin-bottom:10px;" href="#"><i class="fa fa-google" style="color:rgb(255,255,255);width:56px;"></i>S'inscrire avec Google+</a></div>
            </div>
            <div class="d-flex flex-row align-items-center login-box-seperator-container">
                <div class="login-box-seperator"></div>
                <div class="login-box-seperator-text">
                    <p style="margin-bottom:0px;padding-left:10px;padding-right:10px;font-weight:400;color:rgb(201,201,201);">ou</p>
                </div>
                <div class="login-box-seperator"></div>
            </div>
            <div class="email-login" style="background-color:#ffffff;">
                <input class="form-control text-imput form-control" type="text" id="name" name="name" style="margin-top:10px;" placeholder="Nom" minlength="6">
                <span class="error-message" id="name-error" style="color: red;"></span>

                <input class="form-control text-imput form-control" type="text" id="prenom" name="prenom" style="margin-top:10px;" placeholder="Prénom(s)" minlength="6">
                <span class="error-message" id="prenom-error" style="color: red;"></span>

                <input class="form-control text-imput form-control" type="text" id="telephone" name="telephone" style="margin-top:10px;" placeholder="Téléphone" minlength="6">
                <span class="error-message" id="telephone-error" style="color: red;"></span>

                <input class="form-control text-imput form-control" type="text" id="adresse" name="adresse" style="margin-top:10px;" placeholder="Adresse" minlength="6">
                <span class="error-message" id="adresse-error" style="color: red;"></span>

                <input class="form-control email-imput form-control" type="email" id="email" name="email" style="margin-top:10px;" placeholder="E-mail" minlength="6">
                <span class="error-message" id="email-error" style="color: red;"></span>

                <input class="form-control password-input form-control" type="password" id="password" name="password" style="margin-top:10px;" placeholder="Mot de passe" minlength="8" required>

                <div id="password-conditions" style="font-size: 14px; color: #999;"></div>
                <input class="form-control password-input form-control" type="password" id="password_confirmation" name="password_confirmation" style="margin-top:10px;" placeholder="Confirmer le mot de passe" minlength="6">
            </div>
            <div class="submit-row" style="margin-bottom:8px;padding-top:0px;">
                <button class="btn btn-primary d-block box-shadow w-100" id="submit-id-submit" type="submit">S'inscrire</button>

                <div class="d-flex justify-content-between">
                    <div class="form-check form-check-inline" id="form-check-rememberMe"><input class="form-check-input" type="checkbox" id="formCheck-1" for="remember" style="cursor:pointer;" name="check"><label class="form-check-label" for="formCheck-1"><span class="label-text">Accepter les termes du Politique de confidentialité.</span></label></div>
                </div>
            </div>
            <div id="login-box-footer" style="padding: 10px 20px;padding-bottom: 23px;padding-top: 18px;margin-bottom: -1px;">
                <p style="margin-bottom:0px;">Vous avez déjà un compte?<a id="register-link" href="Se connecter.php">Se connecter!</a></p>
            </div>
        </div>
    </form>




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
    document.getElementById("signup").addEventListener("submit", function(event) {
        // Récupération des valeurs des champs
        let name = document.getElementById("name").value;
        let prenom = document.getElementById("prenom").value;
        let telephone = document.getElementById("telephone").value;
        let adresse = document.getElementById("adresse").value;
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        // Récupération des éléments pour afficher les messages d'erreur
        let nameError = document.getElementById("name-error");
        let prenomError = document.getElementById("prenom-error");
        let telephoneError = document.getElementById("telephone-error");
        let adresseError = document.getElementById("adresse-error");
        let emailError = document.getElementById("email-error");
        let passwordError = document.getElementById("password-error");

        // Vérification du champ "Nom"
        if (name === "") {
            nameError.innerHTML = "Le nom est requis!";
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            nameError.innerHTML = ""; // Efface le message d'erreur
        }

        // Vérification du champ "Prénom"
        if (prenom === "") {
            prenomError.innerHTML = "Le prénom est requis!";
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            prenomError.innerHTML = ""; // Efface le message d'erreur
        }

        // Vérification du champ "Téléphone"
        if (telephone === "") {
            telephoneError.innerHTML = "Le téléphone est requis!";
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            telephoneError.innerHTML = ""; // Efface le message d'erreur
        }

        // Vérification du champ "Adresse"
        if (adresse === "") {
            adresseError.innerHTML = "L'adresse est requise!";
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            adresseError.innerHTML = ""; // Efface le message d'erreur
        }

        // Vérification du champ "Email"
        if (email === "") {
            emailError.innerHTML = "L'adresse email est requise!";
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            emailError.innerHTML = ""; // Efface le message d'erreur
        }

        // Vérification du champ "Mot de passe"
        if (password === "") {
            passwordError.innerHTML = "Le mot de passe est requis!";
            event.preventDefault(); // Empêche l'envoi du formulaire
        } else {
            passwordError.innerHTML = ""; // Efface le message d'erreur
        }

    });
</script>


    <script>
    document.getElementById("password").addEventListener("input", function() {
        const password = document.getElementById("password").value;
        const conditions = {
            minLength: password.length >= 8,
            hasUppercase: /[A-Z]/.test(password),
            hasNumber: /\d/.test(password),
            hasSpecialChar: /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)
        };

        const conditionsMet = Object.values(conditions).every(cond => cond);

        let message = "";
        message += conditions.minLength ? "✔️ Au moins 8 caractères, <br>" : "❌ Au moins 8 caractères, <br>";
        message += conditions.hasUppercase ? "✔️ Au moins 1 majuscule, <br>" : "❌ Au moins 1 majuscule, <br>";
        message += conditions.hasNumber ? "✔️ Au moins 1 chiffre, <br>" : "❌ Au moins 1 chiffre, <br>";
        message += conditions.hasSpecialChar ? "✔️ Au moins un caractère spécial." : "❌ Au moins un caractère spécial.";

        document.getElementById("password-conditions").innerHTML = message;

        if (conditionsMet) {
            document.getElementById("password-conditions").style.color = "green";
        } else {
            document.getElementById("password-conditions").style.color = "red";
        }
    });
    </script>

</body>

</html>