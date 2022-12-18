<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<center>
	<head>
		<meta charset="utf-8">
        <title>Fornisseur Liste</title>
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
        <h1>LISTE Fornisseur</h1>
		<table>
		<thead>
      <tr>
        <th>IdFornisseur</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sexe</th>
        <th>Adress</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fornisseur ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr>
        <td><?php echo @$ligne['IdFornisseur']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Prenom']?></td>
        <td><?php echo @$ligne['Sexe']?></td>
        <td><?php echo @$ligne['Adress'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
	</body> 
	</center>
</html>