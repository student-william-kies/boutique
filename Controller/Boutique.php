<?php

namespace Controller;

require_once ('../../autoload.php');

class Produits{

    public function last(){

        $last = \Model\last();

        while ($count = $last->fetch(PDO::FETCH_ASSOC)){

            $_GET['id'] = @$count['id'];

            echo '';

        }
        return $count;


    }
}

?>