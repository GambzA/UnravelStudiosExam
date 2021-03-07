<?php
error_reporting(E_ALL);
session_start();
include 'config.php';
include 'libraries/autoload.php';
$page   = $_GET['page'] ?? false;
$mode   = $_GET['val1'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="<?= URL_LINK; ?>js/jquery.ui.widget.js"></script>
    <script src="<?= URL_LINK; ?>js/jquery.fileupload.js"></script>
    <script src="<?= URL_LINK; ?>js/jquery.iframe-transport.js"></script>
    <script src="<?= URL_LINK; ?>js/jquery.fancy-fileupload.js"></script>


    <link href="<?= URL_LINK; ?>css/fancy_fileupload.css" rel="stylesheet">

    <link href="<?= URL_LINK; ?>css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php if (isset($_SESSION["LUXURIABE"]["logged_in"]) && $_SESSION["LUXURIABE"]["logged_in"] == 1) : ?>


            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading">ECOMMERCE</div>
                <div class="list-group list-group-flush">
                    <a href="<?= URL_LINK; ?>product" class="list-group-item list-group-item-action bg-light">Products & Items</a>
                    <a href="<?= URL_LINK; ?>customer" class="list-group-item list-group-item-action bg-light">Customers</a>
                    <a href="<?= URL_LINK; ?>transaction" class="list-group-item list-group-item-action bg-light">Transaction List</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <br />
                </nav>

                <div class="container-fluid">
                    <?php
                    // CHECK IF LOGGED IN
                    $redirectFile = "index.php";
                    if ($page != false) :
                        if ($mode != false) :
                            $redirectFile = "$mode.php";
                        endif;
                        include "components/$page/$redirectFile";
                    endif;


                    ?>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        <?php
        else :
        ?>
            <!-- Page Content -->
                <div class="container">
                    <?php
                    include "components/login/index.php";
                    ?>
                </div>
            <!-- /#page-content-wrapper -->

        <?php

        endif;
        ?>

    </div>
</body>

</html>