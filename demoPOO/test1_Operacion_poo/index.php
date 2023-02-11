<?php

    require_once("ClassOperacion.php");

    $operacion1 = new Operacion(10,2);

    $totalSuma = $operacion1->getSuma();
    echo "Total suma: ".$totalSuma."<br>";

    $totalResta = $operacion1->getResta();
    echo "Total resta: ".$totalResta."<br>";

    $totalMultiplica = $operacion1->getMultiplica();
    echo "Total multiplicacion: ".$totalMultiplica."<br>";

    $totalDivide = $operacion1->getDivide();
    echo "Total divide: ".$totalDivide."<br>";

?>