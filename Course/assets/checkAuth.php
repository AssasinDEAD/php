<?php

    if(isset($_SESSION['user']))
    if($_SESSION['user']['ban']=='yes'){
        echo 'You have been banned forever';
    }
    else{
        $user = $_SESSION['user'];}
    else {
        $_SESSION['status'] = 'mainError';
        $_SESSION['message'] = 'First you need to login';
        header("Location: logIn.php");
    }

?>