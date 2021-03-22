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
        <link rel="icon" href="">
    </head>

    <!-- Header -->
    <header>
        <section class="container-fluid header__bg">
            <section class="container header__section">
                <img src="https://www.countryflags.io/fr/shiny/64.png">
                <p><span>Boutique Française Officielle</span></p>
                <a href="" id="contact"><i class="fas fa-address-book"></i> <span>Contact</span></a>
            </section>
            <section class="container header__container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <!-- First Navbar -->
                    <section class="container-fluid first__ul">
                        <img src="images/logo__store.svg" id="logo" alt="logo">
                    </section>

                    <!-- Second Navbar -->
                    <section class="container-fluid second__ul" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item btn-primary" id="figurines"><a class="nav-link" href="#">Figurines</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Nouveautés</a></li>
                        </ul>
                        <form action="" method="get" class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </section>

                    <!-- Third Navbar -->
                    <section class="container-fluid third__ul">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" id="phone"><a class="nav-link" href="#"><i class="fas fa-phone-square"></i> 04.56.92.14.36</a></li>
                            <li class="nav-item" id="account"><a class="nav-link" href="#"><i class="fas fa-user-circle"></i> Mon Compte</a></li>
                            <li class="nav-item" id="shopping"><a class="nav-link" href="#"><i class="fas fa-shopping-basket"></i> Panier</a></li>
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
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/scripts.js"></script>
</html>