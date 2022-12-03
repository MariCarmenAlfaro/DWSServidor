<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 0);
function obtenerVocal($parametro)
{
    $vocales = ['a', 'e', 'i', 'o', 'u'];

    if (empty($_GET[$parametro])) {
        echo "el parametro esta vacio";
    } else {
        if (in_array($_GET[$parametro], $vocales)) {
            echo 'es una vocal';
        } else {
            echo 'No es una vocal';
        }
    }
}
