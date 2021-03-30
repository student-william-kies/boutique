<?php
namespace Controller;

class Controller
{
    /**
     * Vas sécuriser les données passées en paramètres
     *
     * @param $var
     * @return string
     */
    public function secure($var): string
    {
        $var = htmlspecialchars(trim($var));

        return $var;
    }
}