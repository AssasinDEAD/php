<?php

if(isset($_SESSION[ 'user'])){
    if($_SESSION['user']['ban']=='yes'){
        echo 'You have been banned forever';
    }
    else{
    if($_SESSION['user']['role'] == 'author'){
        $user = $_SESSION['user'];
        
    }
    else {
        header ("Location: index.php");
    }
}
}
else {
$_SESSION['status'] = 'mainError';
$_SESSION['message'] = 'First you need to login';
header ("Location: logIn.php");

}
?>