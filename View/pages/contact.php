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
            </section>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
