<?php
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
    }
    else{
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>index</title>
    </head>
    <body>
        <main>
            <form method="post">
                <div id="errors"></div> <!-- Contiendra les messages d'erreurs de paiement. -->
                <input id="cardholder-name" type="text" placeholder="Titulaire de la carte">
                <div id="card-element"></div> <!-- Contiendra le formulaire de saisie des informations de carte. -->
                <div id="card-errors" role="alert"></div>
                <button id="card-button" type="button" data-secret="<?= $intent['client_secret'] ?>">Valider le paiement</button>
            </form>
        </main>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="js/scripts_paiement.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>