<?php 
  include '../../db/conn.php';
  include("../Admin/Check_If_Admin.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM articles WHERE IdArticle=$id";
        $result = mysqli_query($conn,$sql);
    }
    header("location: ../AffichageListes/Show_Articles_Liste.php");
        exit();
?>