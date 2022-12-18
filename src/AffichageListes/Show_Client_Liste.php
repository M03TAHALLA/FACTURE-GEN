<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<center>
	<head>
		<meta charset="utf-8">
        <title>Client Liste</title>
		<style>
			td{
				text-align : center;
				padding : 20px;
			}
			table{
				border : solid 10px;
				padding : 50px
			}
		</style>
	</head>
	<body>
        <h1>LISTE Client</h1>
		<table>
		<thead>
      <tr>
        <th>IdClient</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Sexe</th>
		<th>Adresse</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM client ";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr>
        <td><?php echo @$ligne['IdClient']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Email']?></td>
        <td><?php echo @$ligne['Sexe']?></td>
		<td><?php echo @$ligne['Adresse'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
	</body> 
	</center>
</html>