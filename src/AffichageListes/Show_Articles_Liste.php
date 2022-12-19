<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
	include ("../Include/nav.php");
	
	?> <!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="utf-8">
			<title>Articles Liste</title>
			<style>
				td,tr{
					text-align : center;
					padding : 20px;
				}
			</style>
		</head>
		<body>
        <div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">ARTICLES</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
      <tr>
        <th>IdArticle</th>
        <th>NomArticle</th>
        <th>Description</th>
        <th>Prix</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM articles ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr scope="row">
        <td><?php echo @$ligne['IdArticle']?></th>
        <td><?php echo @$ligne['NomArticle']?></td>
        <td><?php echo @$ligne['Description']?></td>
        <td><?php echo @$ligne['Prix'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
		</div>
	</div>
	 </body> 
</html>
<?php include '../Include/foot.php'; ?>
