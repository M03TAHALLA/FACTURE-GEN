<?php 
   session_start();
  include '../../db/conn.php';
  include("../Authentification/Check_if_Logged_In.php");
  if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM fichdevis WHERE NumDevis=$id ";
        $result = mysqli_query($conn,$sql);
    }
    header("location: ../AffichageListes/Show_Devise_Liste.php");
        exit();
?>