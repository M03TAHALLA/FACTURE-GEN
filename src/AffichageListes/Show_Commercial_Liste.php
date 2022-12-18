<?php include("../../db/conn.php") ?>
<!DOCTYPE html>
<html lang="fr">
	<center>
	<head>
		<meta charset="utf-8">
        <title>Commercial Liste</title>
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
        <h1>LISTE Commercial</h1>
		<table>
		<thead>
      <tr>
        <th>IdCommercial</th>
        <th>Nom</th>
        <th>Prenom</th>
		<th>Role</th>
        <th>Sexe</th>
        <th>Email</th>
        <th>Password</th>
      </tr>
    </thead>
		<?php
		$mysqli = new mysqli($servername,$username,$password,$username);
		$requete = "SELECT * FROM commercial";
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {?>
	<tbody>
      <tr>
        <td><?php echo @$ligne['IdCommercial']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Prenom']?></td>
		<td><?php echo @$ligne['Role']?></td>
		<td><?php echo @$ligne['Sexe']?></td>
        <td><?php echo @$ligne['Email']?></td>
		<td><?php echo @$ligne['Password'].'<br>'?></td>



      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
	</body> 
	</center>
</html>