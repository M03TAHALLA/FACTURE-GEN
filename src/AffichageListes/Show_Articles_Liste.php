<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<center>
	<head>
		<meta charset="utf-8">
        <title>Articles Liste</title>
		<style>
			td{
				text-align : center;
				padding : 30px;
			}
			table{
				border : solid 10px;
				padding : 50px
			}
		</style>
	</head>
	<body>
        <h1>LISTE Articles</h1>
		<table>
		<thead>
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
      <tr>
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
	</body> 
	</center>
</html>