<?php
namespace Controller;
require_once ('Controller.php');
require ('../../Model/Ordered.php');

class Ordered extends Controller
{

    public function GetingOrder()
    {
        $i = 0;

        $createOrder = new \Model\Ordered();

        foreach ($_SESSION['panier'] as $value)
        {
            $convert = $_SESSION['panier'][$i];
            $createOrder -> getOrder($_SESSION['utilisateur']['prenom'], $_SESSION['utilisateur']['nom'], $_SESSION['utilisateur']['email'], $_SESSION['utilisateur']['telephone'], $_SESSION['utilisateur']['adresse'], $_SESSION['utilisateur']['ville'], $_SESSION['utilisateur']['codep'], $_SESSION['panier'][$i]['titre'], $_SESSION['panier'][$i]['prix'], $_SESSION['utilisateur']['id']);

            $i++;
        }
    }
}