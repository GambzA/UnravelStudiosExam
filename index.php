<?php
    session_start();
    include 'config.php';
    include 'libraries/autoload.php';
    $page   = $_GET['page'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= BRAND_NAME; ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= CSS; ?>style.css">
    <script src="https://use.fontawesome.com/9ff77610f4.js"></script>
</head>
<body>
    <?php 
        include 'header.php'; 

        if($page != false):
            include "views/$page/index.php";
        else:
            include "views/home/index.php";
            $page = 'home';
        endif;
        
        include 'footer.php'; 
        include "views/$page/scripts.php";
    ?>
</body>
</html>