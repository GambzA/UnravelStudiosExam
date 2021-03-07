<?php 
    session_start();
    include '../../config.php';
    include '../../libraries/autoload.php';

    unset($_SESSION['LUXURIAFE']['cart']);

    header("Location: ".URL_LINK."confirmation");
?>