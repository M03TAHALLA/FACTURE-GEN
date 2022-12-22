<?php 
  include '../../db/conn.php';
  include("../Admin/Check_If_Admin.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM client WHERE IdClient=$id";
        $result = mysqli_query($conn,$sql);
    }
    header("location: ../AffichageListes/Show_Client_Liste.php");
        exit();
?>