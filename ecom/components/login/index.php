<?php
    $login_success = 0;
    if(isset($_POST)):
        $username = $_POST['username'] ?? false;
        if($username != false):
            // check if email exists
            $user = $db->queryFirstRow("SELECT * FROM ecom_user WHERE userName = '$username'");
            if(!empty($user)):
                // LOGIN SUCCESSFUL

                $password_md5 = $user['userPass'];
                // compare pw
                if (md5($_POST['password']) == $password_md5):
                    $_SESSION["LUXURIABE"] = 1;
                    $login_success = 1;
                    header("Location: ".URL_LINK);
                endif;
            endif;
        endif;
    endif;
?>


<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-6 mx-auto">
            <div class="jumbotron">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Email address</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                
                <?php
                    if($login_success == 0):
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Login Failed! 
                        </div>
                        <?php
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>