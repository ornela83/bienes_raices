<?php

function conectarDB() {
    $db = mysqli_connect('localhost', 'root',  'root', 'bienes_raices');
    mysqli_set_charset($db, 'utf8');
    
    if(!$db) {
        echo 'Error! no se pudo conectar';
        exit;
    }
    return $db;
}
