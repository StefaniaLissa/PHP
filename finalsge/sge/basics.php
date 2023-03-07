<?php

    // Ifs

    $edad = 17;
    if ($edad < 18)
        echo 'eres menor';
    else if ($edad = 18)
        echo 'ya puedes ir a la carcel porque tienes '.$edad;
    else
        echo 'ya eres un viejuno';

    // Switch

    $dia = 'lunes';
    switch($dia) {
        case 'lunes':
            echo 'es lunes';
        default:
            echo 'no es lunes';

    }

?>