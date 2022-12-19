
<?php


if(!isset($_SESSION['IdCommercial']) && $_SESSION['Admin'] == false){
   header('location: ../Commun/home.php');
}

?>