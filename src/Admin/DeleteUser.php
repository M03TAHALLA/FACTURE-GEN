
<?php 
  include '../../db/conn.php';
  include("../Admin/Check_If_Admin.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM commercial WHERE IdCommercial=$id";
        $result = mysqli_query($conn,$sql);
    }
    header("location: ../AffichageListes/Show_Commercial_Liste.php");
        exit();
?>