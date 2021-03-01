<?php
    spl_autoload_register('autoLoadClasses');

    function autoLoadClasses($className){
        $path = "";
        $ext  = ".class.php";
        $fullpath = $path.$className.$ext;
        include_once $fullpath;
    }

    $db = new MeekroDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>