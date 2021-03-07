<?php
    session_start();
    include '../../../config.php';
    include '../../../libraries/autoload.php';

    $result = array();

    $result['success'] = 'false';
    $result['message'] = 'There was a problem with the registration. Please try again after a few minutes.';

    if(isset($_POST)):
        //CHECK IF EMAILS EXISTS
        $exists = array();
        $exists = $db->QueryFirstRow("SELECT count(*) as `user_exists`,customerPassword,customerID FROM ecom_customer WHERE customerEmail = '{$_POST['emailAdress']}' ");
        if($exists['user_exists'] > 0):
            //SET SESSIONS
            if (md5($_POST['password']) == $exists['customerPassword']):
                $_SESSION["LUXURIAFE"]["logged_in"] = 1;
                $_SESSION["LUXURIAFE"]["cust"]      = $exists['customerID'];
                $result['success'] = 'true';
                $result['message'] = 'Login Successful';    
            else:
                $result['success'] = 'false';
                $result['message'] = 'Invalid Password';    
            endif;
        else:
            $result['success'] = 'false';
            $result['message'] = 'This user does not exist!';
        endif;

    endif;

    echo json_encode($result);
?>