<?php require ('../../Controller/Boutique.php'); ?>

<?php require ('../../Model/Boutique.php'); ?>

<?php require ('../../Controller/Ordered.php'); ?>

<?php $css = "css/paiement.css"; ?>

<?php ob_start(); ?>

<?php

session_start();

if(isset($_POST['prix']) && !empty($_POST['prix'])){

    // Nous appelons l'autoloader pour avoir accès à Stripe
    require_once('../../vendor/autoload.php');

    // Nous instancions Stripe en indiquand la clé privée, pour prouver que nous sommes bien à l'origine de cette demande
    \Stripe\Stripe::setApiKey('sk_test_51INaYzFQ99jFDHtEm01BfNp3P2cOUJjDozjXQip5KNNMViBgF3WFcmPgKnGfkJLMikX7skAQz7BR5vJ8sz6NkxK500WnJ8UlYH');

    // Nous créons l'intention de paiement et stockons la réponse dans la variable $intent
    $intent = \Stripe\PaymentIntent::create([
        'amount' => $_POST['prix']*100, // Le prix doit être transmis en centimes
        'currency' => 'eur',
    ]);

    $test = new \Controller\Ordered();
    $test -> GetingOrder();
}
/*else{
    header('Location: ../../index.php');
}*/
?>

        <main>
            <section class="container-fluid">
                <section class="main-content">
                    <form method="post">
                        <h2>Informations de paiement <i class="fab fa-cc-stripe"></i></h2><br>
                        <label for="cardholder-name"></label><input id="cardholder-name" type="text" placeholder="Titulaire de la carte" required><br>
                        <div id="card-element"></div><br> <!-- Contiendra le formulaire de saisie des informations de carte. -->
                        <div id="card-errors" role="alert"></div><br>
                        <div id="errors"></div><br> <!-- Contiendra les messages d'erreurs de paiement. -->
                        <button id="card-button" type="button" class="btn btn-primary" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>
                    </form>
                    <section class="secur-text">
                        <p><i class="fab fa-cc-stripe"></i> Unleashed-store utilise stripe, qui vous garantit une sécurité maximale.<br></p>
                        <p>
                            <i class="fas fa-lock"></i> Nous vous garantissons la sécurité de vos données.<br><br>
                            <i class="fas fa-check-double"></i> Les données sont obligatoires afin de fournir les services souscrits, préparer votre commande<br>
                            et vous adresser des communications et offres commerciales sur les produits et services<br>
                            d'Unleashed-store.<br><br>
                        </p>
                        <p>
                            <i class="far fa-check-circle"></i> En cliquant sur VALIDER , vous acceptez les Conditions Générales de Vente.
                        </p>
                        <p class="text-center py-5">
                            Unleashed-Store vous remercie pour votre confiance et votre achat !
                        </p>
                    </section>
                </section>
            </section>
        </main>

<?php $content = ob_get_clean(); ?>

<?php require ('../layout.php'); ?>
