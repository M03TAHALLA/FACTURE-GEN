<?php 

  if(isset($_POST['delArt'])){
        $idArt = $_POST['idArt'];
        $sql = "DELETE FROM dvs_article WHERE NumDevis=$id AND idArticle='{$_POST["idArt"]}';";
        $result = mysqli_query($conn,$sql);
    }

?>