<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php $css = "css/contact.css"; ?>

<?php ob_start(); ?>

        <section class="container-fluid">
            <section class="main-content">
                <section class="info-content">
                    <h1 class="info-title">INFORMATIONS</h1>
                    <p><i class="fas fa-map-marker-alt"></i> Unleashed Store, France.</p>
                    <hr>
                    <p><i class="fas fa-envelope"></i> Envoyez-nous un e-mail :<br> <a>contact@unleashed-store.com</a></p>
                </section>
                <section class="salut">
                    <img class="salut" src="images/gon.png" alt="salut">
                </section>
                <section class="contact-form">
                    <form method="post">
                        <h1 class="contact-title">CONTACTEZ-NOUS</h1><br>
                        <section class="form-group row">
                            <label for="sujet" class="col-sm-2 col-form-label">Sujet </label>
                            <section class="col-sm-10">
                                <input type="text" class="form-control" name="sujet" placeholder="Service client" maxlength="100" required>
                            </section>
                        </section>
                        <br>
                        <section class="form-group row">
                            <label for="mail" class="col-sm-2 col-form-label">Adresse E-mail </label>
                            <section class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Votre adresse E-mail" required>
                            </section>
                        </section>
                        <br>
                        <section class="form-group row">
                            <label for="message" class="col-sm-2 col-form-label">Message </label>
                            <section class="col-sm-10">
                                <textarea type="text" class="form-control" name="message" rows="5" placeholder="Comment pouvons-nous aider ?" required></textarea>
                            </section>
                        </section>
                        <button type="submit" class="btn btn-dark">Envoyer</button>
                    </form>
                </section>
                <section class="sav">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation"><button class="nav-link active" id="pills-mentions-legales-tab" data-bs-toggle="pill" data-bs-target="#pills-mentions-legales" type="button" role="tab" aria-controls="mentions-legales" aria-selected="true">Mentions légales</button></li>
                        <li class="nav-item" role="presentation"><button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button></li>
                        <li class="nav-item" role="presentation"><button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button></li>
                    </ul>
                    <section class="tab-content" id="pills-tabContent">
                        <section class="tab-pane fade show active" id="pills-mentions-legales" role="tabpanel" aria-labelledby="pills-mentions-legales-tab">
                            <h1>Mentions légales</h1>
                            <h2>1. Présentation</h2>
                            <p>Présente sur le marché depuis 2021, la SARL UNLEASHED-STORE a pour activité la vente de figurines, dérivés des mangas et des jeux vidéo.
                                La SARL UNLEASHED-STORE garantie que ses articles sont neufs et officiels.</p>
                            <h2>2. Evènements</h2>
                            <p>La SARL SHIN SEKAI est présente à de nombreux salons qui se déroulent tout au long de l'année en France (Japan Expo, Paris Manga, TGS, Japan Touch,
                                Japan Sud...) mais aussi en Belgique (MIA, Retro MIA, Japan Belgique...). Ces évènements permettent aux clients de rencontrer toute l'équipe SHIN SEKAI
                                et surtout de pouvoir découvrir toutes les nouveautés en direct !</p>

                        </section>
                        <section class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        </section>
                        <section class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                        </section>
                    </section>
                </section>
            </section>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
