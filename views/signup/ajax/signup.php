<?php
    include '../../../config.php';
    include '../../../libraries/autoload.php';

    $result = array();

    $result['success'] = 'false';
    $result['message'] = 'There was a problem with the registration. Please try again after a few minutes.';

    if(isset($_POST)):
        //CHECK IF EMAILS EXISTS
        $exists = array();
        $exists = $db->QueryFirstRow("SELECT count(*) as `user_exists` FROM ecom_customer WHERE customerEmail = '{$_POST['emailAdress']}' ");
        if($exists['user_exists'] > 0):
            $result['success'] = 'false';
            $result['message'] = 'This email is already registered!';
        else:
            $data_update                        = array();
            $data_update['customerFirstName']   = $_POST['firstName'];
            $data_update['customerLastName']    = $_POST['lastName'];
            $data_update['customerEmail']       = $_POST['emailAdress'];
            $data_update['customerContact']     = $_POST['contactNumber'];
            $data_update['customerAddress']     = $_POST['completeAddress'];
            $data_update['customerPassword']    = md5($_POST['password']);

            $db->insert('ecom_customer',$data_update);
            $customerID = $db->insertId();
            if($customerID > 0):
                $result['success'] = 'true';
                $result['message'] = 'Registration successful.';
            endif;
        endif;

    endif;

    echo json_encode($result);
?>