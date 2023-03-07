<?php
session_start();
if ($_SESSION['autorizado'] == false){
    header("Location: ../index.php");}
?>