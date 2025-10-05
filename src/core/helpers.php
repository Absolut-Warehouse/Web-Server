<?php

use Core\View;

/**
 * On retrouve ici toutes les petites fonctions qui facilitent grandement la vie
 */


/**
 * Fonction qui facilite la vie.
 * Prend juste un nom de fichier et un tableau d'arguments à passé au fichier.
 * @param string $name
 * @param array $data
 * @return false|string
 * @throws Exception
 */
function view(string $name, array $data = [])
{
    return View::make($name, $data);
}
