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
                        <li class="nav-item" role="presentation"><button class="nav-link" id="pills-cgv-tab" data-bs-toggle="pill" data-bs-target="#pills-cgv" type="button" role="tab" aria-controls="pills-cgv" aria-selected="false">CGV</button></li>
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
                            <h2>Objet</h2>
                            <p>La SARL UNLEASHED-STORE propose sur son site internet des articles issus de la Japanimation et assure que tous ses produits sont authentiques
                                et vendus dans leurs boîtes d’origine (pour les articles neufs).<br>
                                La disponibilité des produits indiquée sur le site de la SARL UNLEASHED-STORE reste tributaire de l’état du stock.<br>
                                En période de convention, les disponibilités indiquées sur le site internet ne seront plus garanties.<br>
                                Le stock sera mis à jour par la SARL UNLEASHED-STORE dans les meilleurs délais.<br>
                                Le même article ne pourra être vendu qu'une seule fois au même client.<br>
                                Certains articles apparaissent sur le site internet en précommande.<br>
                                La commande de ces produits donne lieu à une réservation qui est faite avec l’indication de leur date de réception prochaine par la SARL UNLEASHED-STORE.
                            </p>
                            <h2>Produits</h2>
                            <p>La SARL UNLEASHED-STORE propose sur son site internet des articles issus de la Japanimation et assure que tous ses produits sont authentiques
                                et vendus dans leurs boîtes d’origine.<br>
                                La disponibilité des produits indiquée sur le site de la SARL UNLEASHED-STORE reste tributaire de l’état du stock.<br>
                                En période de convention, les disponibilités indiquées sur le site internet ne seront plus garanties.<br>
                                Le stock sera mis à jour par la SARL UNLEASHED-STORE dans les meilleurs délais.<br>
                                Le même article ne pourra être vendu qu'une seule fois au même client.<br>
                                Certains articles apparaissent sur le site internet en précommande.<br>
                                La commande de ces produits donne lieu à une réservation qui est faite avec l’indication de leur date de réception prochaine par la SARL UNLEASHED-STORE.
                            </p>
                            <h2>Commande</h2>
                            <p>
                                Toute commande peut être passée après inscription du client sur le site de la SARL UNLEASHED-STORE 24h/24.
                            </p>
                        </section>
                    </section>
                </section>
            </section>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
