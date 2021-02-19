<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Unleashed Manga - Figurines de Collection, Manga, Hunter X Hunter, Attack On Titan, Monster Hunter World...</title>
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
        <section class="container-fluid header__section">
            <section class="container header__mainInfos">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <section class="container-fluid">
                        <a class="navbar-brand" href="#"><img src="" alt="logo" id="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <section class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Figurines</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">07.65.45.89.99</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Mon Compte</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Nouveautés</a></li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">loupe</button>
                            </form>
                        </section>
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
</html>