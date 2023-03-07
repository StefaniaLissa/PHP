<?php

    session_start();

    if ($_SESSION['autorizado'] == false) {
        header('Location:loginDB.php');
    }

?>