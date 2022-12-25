<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
?>


	  <title>ARTICLES</title>

  </head>
  <body>
<?php 	include ("../Include/nav.php");
        include("../Authentification/Check_if_Logged_In.php");
?>
	  
        <div class = "container ">
<ol class="breadcrumb   my-4 ">
  
        <li class="breadcrumb-item active">ARTICLES</li>
    </ol>
    <?php if($_SESSION['Admin'] == true){?>
    <a class="btn btn-primary " href="../Admin/AddArticle.php" role="button">Ajouter Article</a>
    <?php }?>
	<div class="table-responsive mt-2">
		<table id="table_article" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>IdArticle</th>
        <th>NomArticle</th>
        <th>Description</th>
        <th>Prix</th>
        <?php if($_SESSION['Admin'] == true){?>
        <th>Action</th>
        <?php }
		?>
      </tr>
    </thead>
	<tbody>
  <?php
		$requete = "SELECT * FROM articles ";
		$resultat = $conn->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
      <tr scope="row">
        <td><?php echo @$ligne['IdArticle'];?></th>
        <td><?php echo @$ligne['NomArticle'];?></td>
        <td><?php echo @$ligne['Description'];?></td>
        <td><?php echo @$ligne['Prix'].'<br>';?></td>
        <?php if($_SESSION['Admin'] == true){?>
        <td>
			<?php
			echo 	"<a  class='btn btn-primary btn-sm m-1' href='../Admin/ModifyArticle.php?id=$ligne[IdArticle]'>Modifier</a>";
		
			echo "<a class='btn btn-danger btn-sm' href='../Admin/DeleteArticle.php?id=$ligne[IdArticle]'>Supprimer</a>";
			?>
		</td>
        <?php }
        ?>
      </tr>
		<?php }
		$conn->close();
		?>
		</tbody>
		</table>
		</div>
	</div>
<?php include '../Include/foot.php'; ?>
