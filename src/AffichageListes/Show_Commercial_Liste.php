<?php include("../../db/conn.php"); 
	include("../Include/head.php"); 
	include ("../Include/nav.php");
	
	?>
<!-- <!DOCTYPE html>
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
	<body> -->
<div class = "container ">
<ol class="breadcrumb   my-4 ">
        <li class="breadcrumb-item active">COMMERCIAUX</li>
    </ol>
	<div class="table-responsive">
		<table id="table_devis" class="table table-hover  ">
		<thead class="table-dark">
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
      <tr scope="row">
        <td><?php echo @$ligne['IdCommercial']?></th>
        <td><?php echo @$ligne['Nom']?></td>
        <td><?php echo @$ligne['Prenom']?></td>
		<td><?php echo @$ligne['Sexe']?></td>
        <td><?php echo @$ligne['Email']?></td>
		<td><?php echo @$ligne['Password']?></td>
		<td><?php 
			if($ligne['Admin']== 1)
				echo "Admin <br>";
			else
				echo "Utilisateur <br>";
		?></td>
      </tr>
		<?php }
		$mysqli->close();
		?>
		</tbody>
		</table>
		</div>
</div>
	<!-- </body> 
	</center>
</html> -->
<?php include '../Include/foot.php'; ?>