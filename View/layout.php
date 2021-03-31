<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Unleashed Store - Figurines de Collection, Manga, Hunter X Hunter, Attack On Titan, Monster Hunter World...</title>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href= <?= $css ?> >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- ICO -->
        <link rel="icon" href="images/logo__store.svg">
    </head>

    <!-- Header -->
    <header>
        <section class="container-fluid header__bg">
            <section class="container header__section">
                <img src="https://www.countryflags.io/fr/shiny/64.png" alt="CountryFlag">
                <p><span>Boutique Française Officielle</span></p>
                <a href="contact.php" id="contact"><i class="fas fa-address-book"></i><span>Contact</span></a>
            </section>
            <section class="container header__container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <!-- First Navbar -->
                    <section class="container-fluid first__ul">
                        <a href="home.php"><img src="images/logo__store.svg" id="logo" alt="logo"></a>
                    </section>

                    <!-- Second Navbar -->
                    <section class="container-fluid second__ul" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item btn-primary" id="figurines"><a class="nav-link" href="boutique.php">Figurines</a></li>
                            <li class="nav-item"><a class="nav-link" href="home.php#new-products">Nouveautés</a></li>
                            <li class="nav-item"><a class="nav-link" href="boutique.php">+ connus</a></li>
                            <li class="nav-item"><a class="nav-link" href="boutique.php?Choix=Tous+les+produits&prix=croissant&search=Go+%21">- chères</a></li>
                        </ul>
                    </section>

                    <!-- Third Navbar -->
                    <section class="container-fluid third__ul">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" id="phone"><a class="nav-link" href="#"><i class="fas fa-phone-square"></i> 04.56.92.14.36</a></li>
                            <li class="nav-item dropdown" id="account"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle"></i> Mon Compte</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php if (!isset($_SESSION['utilisateur']['id'])){ echo ('<li><a class="dropdown-item" href="inscription.php">Inscription</a></li>'); } ?>
                                    <?php if (!isset($_SESSION['utilisateur']['id'])){ echo ('<li><a class="dropdown-item" href="connexion.php">Connexion</a></li>'); } ?>
                                    <?php if (isset($_SESSION['utilisateur']['id'])){ echo ('<form method="POST" action="home.php"><li><a class="dropdown-item" href=""><input type="submit" name="logout" value="Déconnexion" class="btn btn-secondary"></a></li></form>'); } ?>
                                    <?php if (isset($_SESSION['utilisateur']['id'])){ echo ('<li><a class="dropdown-item" style="text-decoration: none; color: #428BCA;" href="profil.php">Hi, ' . $_SESSION['utilisateur']['prenom']. '!</a></li>'); } ?>
                                </ul>
                            </li>
                            <li class="nav-item" id="shopping"><a class="nav-link" href="paiement-form.php"><i class="fas fa-shopping-basket"></i> Panier</a></li>
                        </ul>
                    </section>

                </nav>
            </section>
        </section>
    </header>

    <!-- Body -->
    <body>
        <main>
            <article>
                <?= $content ?>
            </article>
        </main>
    </body>

    <!-- Footer -->
    <footer>
        <section class="container-fluid footer-content">
            <section class="container footer-top-content">
                <img src="images/logo__store.svg" class="img-fluid" alt="Logo">
                <p>Unleashed Store est une boutique en ligne française de figurine issue du monde des mangas et des animés.</p>
                <section class="footer-links">
                    <a class="fa fa-facebook"></a>
                    <a class="fa fa-twitter"></a>
                    <a class="fa fa-instagram"></a>
                </section>
            </section>
            <section class="container footer-bottom-content">
                <section class="left-content">
                    <h4>Informations</h4>
                    <p><i class="fas fa-map-marker-alt"></i>unleashed Store - France</p>
                    <p><i class="fas fa-envelope"></i><a href="contact.php">contact@unleashed-store.fr</a></p>
                </section>
                <section class="left-content">
                    <h4>Votre compte</h4>
                    <?php
                    if (isset($_SESSION['utilisateur']))
                    {
                        echo ('
                        <a href="profil.php">Informations personnelles</a>
                        <a href="profil.php">Mes adresses</a>
                        <a href="profil.php">Mes commandes</a>
                        ');
                    }
                    else
                    {
                        echo ('
                        <a href="connexion.php">Informations personnelles</a>
                        <a href="connexion.php">Mes adresses</a>
                        <a href="connexion.php">Mes commandes</a>
                        ');
                    }
                    ?>
                </section>
                <section class="right-content">
                    <h4>Produits</h4>
                    <a href="boutique.php">Tout les produits</a>
                    <a href="home.php#new-products">Nouveautés</a>
                    <a href="boutique.php">Meilleurs ventes</a>
                </section>
                <section class="right-content">
                    <h4>Notre société</h4>
                    <a href="contact.php">Conditions générales de vente</a>
                    <a href="contact.php">Mentions légales</a>
                    <a href="contact.php">Contact</a>
                </section>
            </section>
        </section>
        <section class="container-fluid footer-copyright">
            <p>@ 2021 - Unleashed Store</p>
        </section>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/scripts.js"></script>
</html>