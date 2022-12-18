
<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<center>
	<head>
		<meta charset="utf-8">
        <title>Commande Liste</title>
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
        <h1>LISTE Commandes</h1>
		<table>
		<thead>
      <tr>
        <th>NumCommande</th>
        <th>TotalePrix</th>
        <th>DateCréation</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM commandes";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr>
        <td><?php echo @$ligne['NumCommande']?></th>
        <td><?php echo @$ligne['TotalePrix']?></td>
        <td><?php echo @$ligne['DateCreation'].'<br>';?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
	</body> 
	</center>
</html>