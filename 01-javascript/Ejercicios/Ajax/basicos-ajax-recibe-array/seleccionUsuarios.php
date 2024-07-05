<?php

    //Para pasar un array a javascript no se puede hacer directamente.65983245
    //El array debe ser encode a string (Json Notation o formato Json) y pasado como String desde php a ajax
    //Entonces el string (array en JSON notation) debe ser convertido
    $nombres = ['sonia', 'rosa', 'angel', 'manuel', 'sofia'];


    $perro = [
        'nombre'=> "Scott",
        'color' => "Negro",
        'macho'=> true,
        'edad'=> 5
    ];

    //echo json_encode($nombres);
    echo json_encode($perro);