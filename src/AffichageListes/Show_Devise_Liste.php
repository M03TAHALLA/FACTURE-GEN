<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<center>
	<head>
		<meta charset="utf-8">
        <title>Devise Liste</title>
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
        <h1>FICHE DEVISES</h1>
		<table>
		<thead>
      <tr>
        <th>NumDevis</th>
        <th>IdClient</th>
        <th>DateCréation</th>
		<th>DateExpiration</th>
        <th>TotalePrix</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM fichdevis";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr>
        <td><?php echo @$ligne['NumDevis']?></th>
        <td><?php echo @$ligne['IdClient']?></td>
        <td><?php echo @$ligne['DateCreation']?></td>
		<td><?php echo @$ligne['DateExpiration']?></td>
		<td><?php echo @$ligne['TotalePrix'].'<br>'?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
	</body> 
	</center>
</html>
