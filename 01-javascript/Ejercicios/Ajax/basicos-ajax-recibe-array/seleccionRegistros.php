<?php

    //Para pasar un array a javascript no se puede hacer directamente.65983245
    //El array debe ser encode a string (Json Notation o formato Json) y pasado como String desde php a ajax
    //Entonces el string (array en JSON notation) debe ser convertido
    $registros = array(
        array('sonia', '12/12/2021', '17:00', 'Entrada'),
        array('pichonalegre', '13/12/2021', '18:00', 'Salida'),
        array('manuweb', '15/12/2021', '15:00', 'Entrada')
    );


    echo json_encode($registros);