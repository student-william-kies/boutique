<?php
namespace Controller;
require_once ('Controller.php');
require ('../../Model/Boutique.php');

class Product extends Controller
{
    public function displayNewProducts()
    {
        $display = new \Model\Boutique();
        $display -> getLastProducts();
    }
}