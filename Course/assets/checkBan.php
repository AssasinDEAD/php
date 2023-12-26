
<?php

$user = $_SESSION['user'] ?? ''; 
if($user['ban']=='yes'){
   header("Location: banned.php");
}
?>