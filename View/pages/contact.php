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
                        <li class="nav-item" role="presentation"><button class="nav-link" id="pills-cgv-tab" data-bs-toggle="pill" data-bs-target="#pills-cgv" type="button" role="tab" aria-controls="pills-cgv" aria-selected="false">CGU</button></li>
                        <li class="nav-item" role="presentation"><button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button></li>
                    </ul>
                    <section class="tab-content" id="pills-tabContent">
                        <section class="tab-pane fade show active" id="pills-mentions-legales" role="tabpanel" aria-labelledby="pills-mentions-legales-tab">
                            <h1>Mentions légales</h1>
                            <h2>1. Présentation</h2>
                            <p>Présente sur le marché depuis 2021, la SARL UNLEASHED-STORE a pour activité la vente de figurines, dérivés des mangas et des jeux vidéo.
                                La SARL UNLEASHED-STORE garantie que ses articles sont neufs et officiels.</p>
                            <h2>2. Evènements</h2>
                            <p>La SARL SHIN UNLEASHED-STORE est présente à de nombreux salons qui se déroulent tout au long de l'année en France (Japan Expo, Paris Manga, TGS, Japan Touch,
                                Japan Sud...) mais aussi en Belgique (MIA, Retro MIA, Japan Belgique...). Ces évènements permettent aux clients de rencontrer notre équipe
                                et surtout de pouvoir découvrir toutes les nouveautés en direct !</p>
                            <h2>3. Informations</h2>
                            <p>Siège social : 13100 AIX-EN-PROVENCE<br>
                                Entrepôt : 13300 SALON-DE-PROVENCE<br>
                                contact@unleashed-store.fr / 07 86 92 73 36<br>
                                SIRET n°800 680 566 00030<br>
                                TVA : FR13 800 680 566<br>
                                Date de création : 02/2021<br>
                                Dénomination sociale : SARL UNLEASHED-STORE<br>
                                Dénomination du site internet : UNLEASHED-STORE</p>
                        </section>
                        <section class="tab-pane fade" id="pills-cgv" role="tabpanel" aria-labelledby="pills-cgv-tab">
                            <h1>Conditions générales de vente</h1>
                            <h2>Clause n°1 : Objet</h2>
                            <p>Les conditions générales de vente décrites ci-après détaillent les droits et obligations de la SARL SHIN SEKAI et de son client
                                dans le cadre de la vente de bien sur le site internet www.shin-sekai.fr.<br>
                                Toute personne peut consulter les conditions générales de vente de la SARL SHIN SEKAI sur le site www.shin-sekai.fr.<br>
                                Toute vente accomplie par la SARL SHIN SEKAI pour le compte d’un client implique donc que le client ait pris connaissance
                                des présentes conditions générales de vente et qu’il adhère sans réserve à ces mêmes conditions.
                                Le client renonce ainsi à toute application de ses éventuelles conditions générales d’achat.
                            </p>
                        </section>
                        <section class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                        </section>
                    </section>
                </section>
            </section>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
